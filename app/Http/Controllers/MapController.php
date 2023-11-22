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
        $topics = ['Temperatura' => 'temp', 'Humedad' => 'hum','Viento'=> 'wind' , 'Lluvia' =>'rain' ];
        return view('pages/map/map',compact('topics'));
    }
}
