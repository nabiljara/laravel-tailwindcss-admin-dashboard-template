<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataFeed;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dataFeed = new DataFeed();
        $userData = [
            'api_key' => Auth::user()->api_key,
            'x_api_secret' => Auth::user()->x_api_secret
        ];

        // Construye la URL y los datos para la solicitud POST
        $url = env('API_URL');
        $data = [
            'api_key' => $userData['api_key'],
            'x_api_secret' => $userData['x_api_secret']
        ];

        // Realiza la solicitud POST utilizando el cliente HTTP de Laravel
        $response = Http::post($url, $data);

        // Decodifica la respuesta JSON, si es necesario
        $responseData = $response->json();
        $stations = $responseData['stations'];

        $topics = ['temp' => 'Temperatura', 'hum' => 'Humedad', 'dew_point' => 'Punto de rocio', 'wind_speed_last' => 'Velocidad del viento', 'wind_dir_last' => 'Dirección del viento', 'rain_storm_last_mm' => 'Lluvia', 'battery_voltage' => 'Batería', 'bar_absolute' => 'Presión'];

        $stationTopics = [
            123501 => ['temp', 'hum', 'dew_point', 'wind_speed_last', 'wind_dir_last', 'rain_storm_last_mm', 'battery_voltage', 'bar_absolute'],
            138225 => ['temp', 'hum', 'dew_point', 'battery_voltage', 'bar_absolute'],
            145839 => ['temp', 'hum', 'dew_point', 'wind_speed_last', 'wind_dir_last', 'rain_storm_last_mm', 'battery_voltage', 'bar-absolute'],
            145862 => ['temp', 'hum', 'dew_point', 'battery_voltage', 'bar_absolute'],
            167442 => ['temp', 'hum', 'dew_point', 'battery_voltage', 'bar_absolute']
        ];

        // Notificaciones
        $notificacion1 = [
            'topico' => 'temp',
            'nombre_topico' => 'Temperatura',
            'atributo' => 'Minima',
            'valor' => -5,
            'fecha_hora' => '20/09/2023 13:50',
            'unidad' => '°C'
        ];

        $notificacion2 = [
            'topico' => 'temp',
            'nombre_topico' => 'Velocidad de viento',
            'atributo' => 'Maxima',
            'valor' => 90,
            'fecha_hora' => '21/09/2023 12:50',
            'unidad' => 'km/h'
        ];

        $notificacion3 = [
            'topico' => 'temp',
            'nombre_topico' => 'Humedad',
            'atributo' => 'Maxima',
            'valor' => 70,
            'fecha_hora' => '22/09/2023 11:50',
            'unidad' => '%'
        ];

        $db_fecha_hora = '2023-10-24 11:47:47';
        $fechaHora = DateTime::createFromFormat('Y-m-d H:i:s', $db_fecha_hora);//string to datetime

        $notificacion3['fecha_hora'] = $fechaHora->format('d/m/Y G:i');;

        $notificaciones = [
            $notificacion1,
            $notificacion2,
            $notificacion3
        ];


        return view('pages/dashboard/dashboard', compact(['dataFeed', 'stations', 'topics', 'notificaciones']));
    }
}
