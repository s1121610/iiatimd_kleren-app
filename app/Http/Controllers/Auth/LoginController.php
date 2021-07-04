<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $credentials = $request->all();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        
        if($user == null){
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
                
        return $user->createToken($request->device_name)->plainTextToken;
        
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
