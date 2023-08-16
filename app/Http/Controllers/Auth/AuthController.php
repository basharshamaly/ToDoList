<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{


    public function showLogin()
    {
        return response()->view('cms.auth.login');
    }

    public function Login(AuthRequest $request)
    {

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            return response()->json(['icon' => 'success', 'message' => 'Login is Successfully'],  Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error', 'message' => 'Login is Failed '], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {

        $guard = auth('web')->check() ? 'web' : 'not found';

        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect(route('cms.showlogin'));
    }
}
