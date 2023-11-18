<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function map()
    {
        $userData = [
            'api_key' => Auth::user()->api_key,
            'x_api_secret' => Auth::user()->x_api_secret
        ];

        // Construye la URL y los datos para la solicitud POST
        $url = 'http://localhost:3000/apiv1/estaciones';
        $data = [
            'api_key' => $userData['api_key'],
            'x_api_secret' => $userData['x_api_secret']
        ];

        // Realiza la solicitud POST utilizando el cliente HTTP de Laravel
        $response = Http::post($url, $data);

        // Decodifica la respuesta JSON, si es necesario
        $responseData = $response->json();
        $stations = $responseData['stations'];

        $markers = [];
        foreach ($stations as $station) {
            array_push($markers, ['lat' => $station['latitude'], 'long' => $station['longitude'], 'info' => $station['station_name']]);
        };

        return view('pages/map/map', compact(['stations', 'markers']));
    }
}
