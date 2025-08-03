<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI;

class ChatAppController extends Controller
{
    public function index()
    {
        $chatHistory = session('chat_history', []);
        return view('chatapp', compact('chatHistory'));
    }

    public function store1(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->message;

        $chatHistory = session('chat_history', []);
        $chatHistory[] = ['role' => 'user', 'content' => $userMessage];

        $openAiApiKey = env('OPENAI_API_KEY');

        $response = Http::withToken($openAiApiKey)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $chatHistory,
            'max_tokens' => 100, // limit response size
            'temperature' => 0.0, // lower = more focused response
            'top_p' => 0.8,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.0,
        ]);

        $aiReply = $response->json('choices.0.message.content') ?? 'Sorry, something went wrong.';

        $chatHistory[] = ['role' => 'assistant', 'content' => $aiReply];
        session(['chat_history' => $chatHistory]);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->message;

        $chatHistory = session('chat_history', []);
        
        $chatHistory[] = ['role' => 'user', 'content' => $userMessage];

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $chatHistory,
            'max_tokens' => 100,
            'temperature' => 0.0,
            'top_p' => 0.8,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.0,
        ]);

        $aiReply = $response->choices[0]->message->content ?? 'Sorry, something went wrong.';

        $chatHistory[] = ['role' => 'assistant', 'content' => $aiReply];
        session(['chat_history' => $chatHistory]);

        return redirect()->back();
    }

}
