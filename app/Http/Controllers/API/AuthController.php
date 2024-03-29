<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(ResponseFormatter::error(null, $validator->errors()));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(ResponseFormatter::success(['user' => $user, 'token' => $token, 'token_type' => 'Bearer'], null));
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(ResponseFormatter::error(null, 'Unauthorized'));
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(ResponseFormatter::success(['user' => $user, 'token' => $token, 'token_type' => 'Bearer'], null));
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(ResponseFormatter::success(null, 'Berhasil Logout'));
    }
}
