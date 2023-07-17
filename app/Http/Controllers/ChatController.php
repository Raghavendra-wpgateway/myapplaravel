<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        // $message = $request->input('message');
        $message = "What is Laravel Framework?";


        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);


        $response = $client->post('engines/curie/completions', [
            'json' => [
                'prompt' => $message,
                'max_tokens' => 1000,
                "temperature" => 0.2
            ],
        ]);



        $data = json_decode($response->getBody(), true);
        $reply = $data['choices'][0]['text'];

        $resp = response()->json(['reply' => $reply]);

        echo "<pre>";
        print_r($resp);
        exit();



    }
}
