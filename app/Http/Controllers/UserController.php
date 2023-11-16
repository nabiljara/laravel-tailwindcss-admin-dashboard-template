<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getKeyFeed()
        {
            // $user = new User();
            // return "hola";
            return (object)[
                'api_key' => Auth::user()->api_key,
                'x_api_secret' => Auth::user()->x_api_secret
            ];
        }
}
