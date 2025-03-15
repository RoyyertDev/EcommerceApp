<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\RoleUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login page.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $request->session()->get('status'),
            'canLogin' => Route::has('login'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(
            route(
                Auth::user()->detail->role_id === RoleUser::where('name', 'admin')->first()->id
                ? 'admin.dashboard' 
                : 'dashboard',
                [],
                false
            )
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            if (Auth::user() && Auth::user()->detail && Auth::user()->detail->role_id === RoleUser::where('name', 'admin')->first()->id) {
                $userTokens = Auth::user()->tokens->where('name', 'admin_token');
                $cookieToken = Cookie::get('admin_token');
                $sessionTokenId = $request->session()->get('admin_token_id');
                if ($cookieToken && $sessionTokenId) {
                    foreach ($userTokens as $token) {
                        if ($token->id === $sessionTokenId) {
                            $token->delete();
                            Cookie::queue(Cookie::forget('admin_token'));
                            $request->session()->forget('admin_token_id');
                            break;
                        }
                    }
                }
            }
        }
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
