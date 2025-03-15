<?php

namespace App\Http\Middleware;

use App\Models\RoleUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class HandleAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if (Auth::user()->detail && Auth::user()->detail->role_id === RoleUser::where('name', 'admin')->first()->id) {
                $userToken = Auth::user()->tokens->where('name', 'admin_token')->first();
                if ($userToken) {
                    $sessionTokenId = $request->session()->get('admin_token_id');
                    if ($userToken->id === $sessionTokenId) {
                        return $next($request);
                    } else {
                        Auth::guard('web')->logout();
                        Session::flush();
                        return redirect()->route('login');
                    }
                } else {
                    Auth::guard('web')->logout();
                    Session::flush();
                    return redirect()->route('login');
                }
            } else {
                Auth::guard('web')->logout();
                Session::flush();
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
