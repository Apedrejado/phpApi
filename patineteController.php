<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PatineteController extends Controller
{
    public function getPatinetes()
    {
        $client = new Client();
        
        try {
            $response = $client->get('http://localhost:3000/api/scooters');
            
            $scooters = json_decode($response->getBody(), true);
            
            // Formata a resposta para retornar apenas os campos necessários
            $formattedScooters = array_map(function($scooter) {
                return [
                    'name' => $scooter['name'] ?? null,
                    'description' => $scooter['description'] ?? null,
                    'price' => $scooter['price'] ?? null
                ];
            }, $scooters);
            
            return response()->json($formattedScooters);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao acessar a API de patinetes',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}