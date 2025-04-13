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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user = Auth::user();
        $adminRoleId = RoleUser::where('name', 'admin')->first()?->id;

        if (!$user->detail || $user->detail->role_id !== $adminRoleId) {
            Auth::guard('web')->logout();
            Session::flush();
            return redirect()->route('login');
        }

        $sessionTokenId = $request->session()->get('admin_token_id');
        $userToken = Auth::user()->tokens->where('id', $sessionTokenId)->first();

        if ($userToken && $userToken->id == $sessionTokenId) {
            return $next($request);
        }

        Auth::guard('web')->logout();
        Session::flush();
        return redirect()->route('login');
    }
}
