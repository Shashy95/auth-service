<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
        ]);

        $response = Http::asForm()->post('http://auth-server.test/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $request->client_id,
            'client_secret' => $request->client_secret,
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '',
        ]);
         
        return $response->json();
    }
}
