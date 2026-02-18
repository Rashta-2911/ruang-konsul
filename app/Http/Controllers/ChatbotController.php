<?php

namespace App\Http\Controllers;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ChatbotController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);
        $customerId = Auth::guard('customer')->user()->customerId;

        ChatMessage::create([
            'customerId'  => $customerId,
            'message'     => $request->message,
            'sender_type' => 'customer',
            'chat_type'   => 'bot', // 🔥 PEMBEDA
            'created_at'  => now()
        ]);


        try {

            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(env('OPENROUTER_API_TIMEOUT', 30))
                ->withHeaders([
                    'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                    'Content-Type'  => 'application/json',
                    'HTTP-Referer'  => url('/'),
                    'X-Title'       => 'RuangKonsul Chatbot'
                ])
                ->post(env('OPENROUTER_API_ENDPOINT') . 'chat/completions', [
                    'model' => 'stepfun/step-3.5-flash:free',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Kamu adalah chatbot RuangKonsul. Jawab dengan ramah dan profesional.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $request->message
                        ]
                    ]
                ]);

            if ($response->status() !== 200) {
                return response()->json([
                    'reply' => 'Server AI sedang bermasalah.'
                ]);
            }

            $data = $response->json();

            return response()->json([
                'reply' => $data['choices'][0]['message']['content'] ?? 'Tidak ada balasan.'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'reply' => 'Terjadi kesalahan sistem.'
            ]);
        }

    }
}
