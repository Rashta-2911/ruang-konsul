<?php

namespace App\Http\Controllers;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;

class ChatbotController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);
        
        try {
            $customerId = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->customerId : 'GUEST';

            // Save customer message
            ChatMessage::create([
                'chatDokterId'  => null, // ✅ Bot messages have no chatDokterId
                'customerId'    => $customerId,
                'message'       => $request->message,
                'sender_type'   => 'customer',
                'chat_type'     => 'bot',
                'created_at'    => now()
            ]);

            // Validate API credentials
            $apiKey = env('OPENROUTER_API_KEY');
            $apiEndpoint = env('OPENROUTER_API_ENDPOINT');
            
            if (empty($apiKey) || empty($apiEndpoint)) {
                Log::error('OpenRouter API credentials missing', [
                    'api_key_set' => !empty($apiKey),
                    'endpoint_set' => !empty($apiEndpoint)
                ]);
                
                return response()->json([
                    'reply' => 'Konfigurasi API belum lengkap. Hubungi administrator.'
                ], 500);
            }

            // Call OpenRouter API
            $response = Http::timeout(env('OPENROUTER_API_TIMEOUT', 30))
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type'  => 'application/json',
                    'HTTP-Referer'  => url('/'),
                    'X-Title'       => 'RuangKonsul Chatbot'
                ])
                ->post($apiEndpoint . 'chat/completions', [
                    'model' => 'stepfun/step-3.5-flash:free',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Kamu adalah AI Specialist dari RuangKonsul. Tugas utamamu adalah memberikan informasi yang berkaitan dengan kesehatan, konsultasi medis, dan layanan di website RuangKonsul. SANGAT PENTING: Jika pengguna bertanya tentang hal-hal di luar kesehatan (seperti politik, hobi, hiburan, resep masakan non-diet, teknologi umum, atau topik lain yang tidak relevan dengan layanan kesehatan kami), kamu HARUS menolak menjawab dengan sopan dan menjelaskan bahwa kamu hanya didesain untuk membantu pertanyaan seputar kesehatan dan layanan di RuangKonsul. Jangan berikan jawaban untuk topik di luar kesehatan meskipun kamu mengetahuinya. Berikan respon yang profesional, empati, dan informatif hanya untuk topik kesehatan.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $request->message
                        ]
                    ]
                ]);

            if ($response->status() !== 200) {
                Log::error('OpenRouter API Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);
                
                return response()->json([
                    'reply' => 'Server AI tidak merespons. Status: ' . $response->status()
                ], $response->status());
            }

            $data = $response->json();
            
            if (!isset($data['choices'][0]['message']['content'])) {
                Log::error('Invalid OpenRouter API response', [
                    'response' => $data
                ]);
                
                return response()->json([
                    'reply' => 'AI tidak memberikan balasan yang valid.'
                ]);
            }

            return response()->json([
                'reply' => $data['choices'][0]['message']['content']
            ]);

        } catch (\Exception $e) {
            Log::error('Chatbot Error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'reply' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }

    }
}
