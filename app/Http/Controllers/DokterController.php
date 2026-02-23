<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\ChatDokter;
use App\Models\ChatMessage;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DokterController extends Controller
{
    // ==============================
    // HALAMAN KATEGORI + SEARCH
    // ==============================
    public function kategori(Request $request)
    {
        $search = $request->search;

        $kategori = Dokter::select('namaBidang')
            ->when($search, function ($q) use ($search) {
                $q->where('namaBidang', 'like', "%$search%");
            })
            ->distinct()
            ->get()
            ->map(function($cat) {
                $cat->count = Dokter::where('namaBidang', $cat->namaBidang)->count();

                if (Schema::hasColumn('dokter', 'statusDokter')) {
                    $cat->online_count = Dokter::where('namaBidang', $cat->namaBidang)
                        ->where('statusDokter', 'online')
                        ->count();
                } else {
                    $cat->online_count = 0;
                }

                return $cat;
            });

        return view('landing.dokter.kategori', compact('kategori', 'search'));
    }


    // ==============================
    // LIST DOKTER PER KATEGORI
    // ==============================
    public function dokterByKategori($kategori)
    {
        $dokter = Dokter::where('namaBidang', $kategori)->get();

        if (Auth::guard('customer')->check()) {
            $customerId = Auth::guard('customer')->user()->customerId;
            $dokter = $dokter->map(function($d) use ($customerId) {
                $chat = ChatDokter::where('dokterId', $d->dokterId)
                    ->where('customerId', $customerId)
                    ->first();
                
                if ($chat) {
                    // Cek apakah sudah dibayar
                    $pembayaran = Pembayaran::where('chatDokterId', $chat->chatDokterId)
                        ->where('status', 'success')
                        ->first();
                    $chat->is_paid = $pembayaran ? true : false;
                    $d->chat = $chat;
                }
                return $d;
            });
        }

        return view('landing.dokter.list', compact('dokter', 'kategori'));
    }


    // ==============================
    // HALAMAN CHAT (WAJIB LOGIN)
    // ==============================
    public function chatDokter($id)
    {
        $dokter = Dokter::findOrFail($id);
        $customer = Auth::guard('customer')->user();

        $chat = ChatDokter::where('dokterId', $id)
            ->where('customerId', $customer->customerId)
            ->first();
 
        if (!$chat) {
            return redirect()->route('landing.dokter.list', ['kategori' => $dokter->namaBidang])
                ->with('error', 'Silakan mulai chat terlebih dahulu.');
        }
 
        // Cek pembayaran
        $pembayaran = Pembayaran::where('chatDokterId', $chat->chatDokterId)
            ->where('status', 'success')
            ->first();
 
        if (!$pembayaran) {
            return redirect()->route('landing.dokter.checkoutChat', $chat->chatDokterId)
                ->with('info', 'Silakan selesaikan pembayaran terlebih dahulu.');
        }
 
        return view('landing.dokter.chat', compact('dokter', 'chat', 'customer'));
    }


    // ==============================
    // SIMPAN CHAT KE DATABASE
    // ==============================
    public function storeChat($id)
    {
        $dokter = Dokter::findOrFail($id);
        $customer = Auth::guard('customer')->user();
        $customerId = $customer->customerId;
 
        // Cek apakah sudah ada chat
        $existingChat = ChatDokter::where('dokterId', $id)
            ->where('customerId', $customerId)
            ->first();
 
        if ($existingChat) {
            // Cek status pembayaran
            $pembayaran = Pembayaran::where('chatDokterId', $existingChat->chatDokterId)
                ->where('status', 'success')
                ->first();
            
            if ($pembayaran) {
                return redirect()->route('landing.dokter.chat', $dokter->dokterId);
            } else {
                return redirect()->route('landing.dokter.checkoutChat', $existingChat->chatDokterId);
            }
        }
 
        // Create ChatDokter
        $chat = ChatDokter::create([
            'customerId'   => $customerId,
            'dokterId'     => $dokter->dokterId,
            'date'         => now(),
            'status'       => 'Online',
            'gambar'       => $dokter->gambar,
            'price'        => $dokter->hargaKonsultasi
        ]);
 
        return redirect()->route('landing.dokter.checkoutChat', $chat->chatDokterId);
    }
 
    public function checkoutChat($chatId)
    {
        $chat = ChatDokter::with('dokter')->findOrFail($chatId);
        $customer = Auth::guard('customer')->user();
 
        if ($chat->customerId !== $customer->customerId) {
            abort(403);
        }
 
        return view('landing.dokter.checkout_chat', compact('chat', 'customer'));
    }
 
    public function processChatPayment(Request $request, $chatId)
    {
        $chat = ChatDokter::findOrFail($chatId);
        $customer = Auth::guard('customer')->user();
 
        $request->validate([
            'metodePembayaran' => 'required',
        ]);
 
        // Create Pemesanan record (as header)
        $lastPemesanan = Pemesanan::orderBy('pemesananId', 'desc')->first();
        $pmNumber = $lastPemesanan ? intval(substr($lastPemesanan->pemesananId, 2)) + 1 : 1;
        $pemesananId = 'PM' . str_pad($pmNumber, 3, '0', STR_PAD_LEFT);
 
        Pemesanan::create([
            'pemesananId' => $pemesananId,
            'customerId' => $customer->customerId,
            'date' => now(),
            'totalPrice' => $chat->price ?? 0
        ]);
 
        // Create Pembayaran record
        $lastPembayaran = Pembayaran::orderBy('pembayaranId', 'desc')->first();
        $pyNumber = $lastPembayaran ? intval(substr($lastPembayaran->pembayaranId, 2)) + 1 : 1;
        $pembayaranId = 'PY' . str_pad($pyNumber, 3, '0', STR_PAD_LEFT);
 
        Pembayaran::create([
            'pembayaranId' => $pembayaranId,
            'customerId' => $customer->customerId,
            'pemesananId' => $pemesananId,
            'chatDokterId' => $chat->chatDokterId,
            'amount' => $chat->price ?? 0,
            'metodePembayaran' => $request->metodePembayaran,
            'date' => now(),
            'status' => 'success' // Simulated direct success
        ]);
 
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pembayaran berhasil! Sekarang Anda dapat membuka chat.',
                'redirect' => route('landing.dokter.list', ['kategori' => $chat->dokter->namaBidang])
            ]);
        }

        return redirect()->route('landing.dokter.list', ['kategori' => $chat->dokter->namaBidang]);
    }


    // ==============================
    // SEND MESSAGE (API AJAX)
    // ==============================
    public function sendMessage(Request $request, $chatDokterId)
    {
        $request->validate([
            'message' => 'required|string|max:5000'
        ]);

        $chat = ChatDokter::findOrFail($chatDokterId);
        $customer = Auth::guard('customer')->user();

        if ($chat->customerId !== $customer->customerId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $message = ChatMessage::create([
            'chatDokterId' => $chatDokterId,
            'customerId'   => $customer->customerId,
            'dokterId'     => $chat->dokterId,
            'message'      => $request->message,
            'sender_type'  => 'customer',
            'chat_type'    => 'doctor',
            'created_at'   => now()
        ]);
        try {
            // Context system instruction
            $doctorName = $chat->dokter ? $chat->dokter->dokterName : 'Dokter';
            $specialty  = $chat->dokter ? $chat->dokter->namaBidang : 'Umum';
            $systemPrompt = "Anda adalah {$doctorName}, seorang dokter spesialis {$specialty}. 
            Jawab pertanyaan pasien dengan ramah, profesional, dan medis namun mudah dipahami. 
            Jawab singkat dan padat. Jika pertanyaan di luar medis, arahkan kembali ke konsultasi kesehatan.";
            // Send to AI
            $response = \Illuminate\Support\Facades\Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                    'Content-Type'  => 'application/json',
                    'HTTP-Referer'  => url('/'),
                    'X-Title'       => 'RuangKonsul Doctor AI'
                ])
                ->post(env('OPENROUTER_API_ENDPOINT', 'https://openrouter.ai/api/v1/') . 'chat/completions', [
                    'model' => 'stepfun/step-3.5-flash:free',
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $request->message]
                    ]
                ]);
            if ($response->status() === 200) {
                $data = $response->json();
                $replyContent = $data['choices'][0]['message']['content'] ?? 'Maaf, saya sedang memeriksa pasien lain. Mohon tunggu sebentar.';
                // Save Doctor Reply
                $doctorReplyMessage = ChatMessage::create([
                    'chatDokterId' => $chatDokterId,
                    'customerId'   => $customer->customerId,
                    'dokterId'     => $chat->dokterId,
                    'message'      => $replyContent,
                    'sender_type'  => 'dokter',
                    'chat_type'    => 'doctor',
                    'created_at'   => now()
                ]);
            }
        } catch (\Exception $e) {
            // Silent fail or log error
            // \Log::error("AI Doctor Error: " . $e->getMessage());
        }
        return response()->json([
            'success' => true,
            'message' => [
                'id'          => $message->id,
                'message'     => $message->message,
                'sender_type' => $message->sender_type,
                'created_at'  => $message->created_at->format('H:i')
            ],
            'reply' => isset($doctorReplyMessage) ? [
                'id'          => $doctorReplyMessage->id,
                'message'     => $doctorReplyMessage->message,
                'sender_type' => 'dokter',
                'created_at'  => $doctorReplyMessage->created_at->format('H:i')
            ] : null
        ]);
    }


    // ==============================
    // GET MESSAGES (LOAD HISTORY)
    // ==============================
    public function getMessages($chatDokterId)
    {
        $chat = ChatDokter::findOrFail($chatDokterId);
        $customer = Auth::guard('customer')->user();

        if ($chat->customerId !== $customer->customerId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $messages = ChatMessage::where('chatDokterId', $chatDokterId)->where('chat_type','doctor') // 🔥 FILTER

            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($msg) {
                return [
                    'id'          => $msg->id,
                    'message'     => $msg->message,
                    'sender_type' => $msg->sender_type,
                    'created_at'  => $msg->created_at->format('H:i')
                ];
            });

        return response()->json($messages);
    }


    // ==============================
    // HALAMAN UTAMA DOKTER (LANDING)
    // ==============================
    public function index(Request $request)
    {
        $kategori = Dokter::select('namaBidang')->distinct()->get();

        $dokter = Dokter::when($request->kategori, function ($q) use ($request) {
            $q->where('namaBidang', $request->kategori);
        })->get();

        return view('landing.sections.dokter', compact('dokter', 'kategori'));
    }
}