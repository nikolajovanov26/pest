<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    function register(Request $request){

        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // dd($user);
        
        $response = Http::asForm()->post('http://pest.test/oauth/token', [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'uvhBbuoBOCiL2rDPNoS3n8ulZhxUCHAf6NQaNmck',
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '',
        ]);
        
        dd($response->json());
         
        return $response->json();
    }
}


