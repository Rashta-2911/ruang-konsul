<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\ChatDokter;
use App\Models\ChatMessage;
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
                $d->chat = ChatDokter::where('dokterId', $d->dokterId)
                    ->where('customerId', $customerId)
                    ->with('dokter')
                    ->first();
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

        return view('landing.dokter.chat', compact('dokter', 'chat', 'customer'));
    }


    // ==============================
    // SIMPAN CHAT KE DATABASE
    // ==============================
    public function storeChat($id)
    {
        $dokter = Dokter::findOrFail($id);
        $customerId = Auth::guard('customer')->user()->customerId;

        // Cek apakah sudah ada chat aktif
        $existingChat = ChatDokter::where('dokterId', $id)
            ->where('customerId', $customerId)
            ->first();

        if ($existingChat) {
            return redirect()->route('landing.dokter.chat', $dokter->dokterId)
                ->with('info', 'Chat sudah ada!');
        }

        // Generate ID otomatis
        $last = ChatDokter::orderBy('chatDokterId', 'desc')->first();
        $number = $last ? intval(substr($last->chatDokterId, 2)) + 1 : 1;
        $chatId = 'CD' . str_pad($number, 3, '0', STR_PAD_LEFT);

        ChatDokter::create([
            'chatDokterId' => $chatId,
            'customerId'   => $customerId,
            'dokterId'     => $dokter->dokterId,
            'date'         => now(),
            'status'       => 'Online', // ✅ sesuai ENUM: Online, Offline, Sibuk, Tersedia
            'gambar'       => $dokter->gambar,
        ]);

        return redirect()->route('landing.dokter.chat', $dokter->dokterId)
            ->with('success', 'Chat berhasil dibuat!');
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

        return response()->json([
            'success' => true,
            'message' => [
                'id'          => $message->id,
                'message'     => $message->message,
                'sender_type' => $message->sender_type,
                'created_at'  => $message->created_at->format('H:i')
            ]
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