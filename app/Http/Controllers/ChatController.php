<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        // Utilise l'API OpenRouter (commentez cette ligne pour tester en mode mock)
        return $this->callOpenRouterAPI($userMessage);
        
        // Pour tester SANS API, décommentez cette ligne :
        // return $this->mockResponse($userMessage);
    }

    private function callOpenRouterAPI($userMessage)
    {
        try {
            $apiKey = env('OPENROUTER_API_KEY');
            
            if (!$apiKey) {
                Log::error('OpenRouter API key missing');
                return $this->mockResponse($userMessage); // Fallback si pas de clé API
            }

            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'HTTP-Referer' => url('/'), // Optionnel
                'X-Title' => 'SmartHealth Tracker', // Optionnel
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'deepseek/deepseek-chat',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Tu es un assistant fitness expert pour SmartHealth Tracker. Réponds en français de manière concise, motivante et adaptée au sport. Donne des conseils pratiques et personnalisés. Sois enthousiaste et professionnel.'
                    ],
                    [
                        'role' => 'user', 
                        'content' => $userMessage
                    ]
                ],
                'max_tokens' => 300,
                'temperature' => 0.7,
            ]);

            Log::info('OpenRouter API Response:', ['status' => $response->status(), 'body' => $response->body()]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['choices'][0]['message']['content'])) {
                    $aiResponse = $data['choices'][0]['message']['content'];

                    return response()->json([
                        'success' => true,
                        'response' => trim($aiResponse),
                    ]);
                } else {
                    Log::error('OpenRouter API invalid response format', $data);
                    return $this->mockResponse($userMessage);
                }
            } else {
                Log::error('OpenRouter API Error: ' . $response->status() . ' - ' . $response->body());
                return $this->mockResponse($userMessage); // Fallback vers les réponses mock
            }

        } catch (\Exception $e) {
            Log::error('Chat Controller Exception: ' . $e->getMessage());
            return $this->mockResponse($userMessage); // Fallback vers les réponses mock
        }
    }

    private function mockResponse($userMessage)
    {
        // Réponses de fallback si l'API échoue
        $responses = [
            "Bonjour ! Je suis votre assistant fitness SmartHealth. Comment puis-je vous aider aujourd'hui ?",
            "Pour améliorer votre cardio, je recommande 30 minutes d'exercice modéré 3 à 5 fois par semaine.",
            "La musculation est excellente pour la santé ! Commencez par des poids légers et augmentez progressivement.",
            "N'oubliez pas de vous hydrater et de bien vous échauffer avant chaque séance de sport !",
            "La régularité est la clé du succès en fitness. Continuez vos efforts !",
            "Pour perdre du poids, combinez exercice cardio et musculation avec une alimentation équilibrée.",
            "Les étirements après l'exercice aident à réduire les courbatures et améliorer la flexibilité."
        ];

        // Réponses contextuelles
        if (stripos($userMessage, 'bonjour') !== false || 
            stripos($userMessage, 'salut') !== false ||
            stripos($userMessage, 'hello') !== false ||
            stripos($userMessage, 'coucou') !== false) {
            $response = $responses[0];
        } elseif (stripos($userMessage, 'cardio') !== false || 
                 stripos($userMessage, 'cœur') !== false ||
                 stripos($userMessage, 'endurance') !== false) {
            $response = $responses[1];
        } elseif (stripos($userMessage, 'musculation') !== false || 
                 stripos($userMessage, 'force') !== false ||
                 stripos($userMessage, 'poids') !== false) {
            $response = $responses[2];
        } elseif (stripos($userMessage, 'perdre') !== false || 
                 stripos($userMessage, 'poids') !== false ||
                 stripos($userMessage, 'mincir') !== false) {
            $response = $responses[5];
        } else {
            $response = $responses[array_rand($responses)];
        }

        return response()->json([
            'success' => true,
            'response' => $response,
        ]);
    }
}