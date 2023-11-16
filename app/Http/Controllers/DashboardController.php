<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
    use Carbon\Carbon;
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

            return view('pages/dashboard/dashboard', compact(['dataFeed','stations']));
        }
    }
