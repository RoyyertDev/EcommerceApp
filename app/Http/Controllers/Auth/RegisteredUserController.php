<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register',[
            'canLogin' => Route::has('login')
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'names' => ['required', 'string', 'max:255'],
                'surnames' => ['required', 'string', 'max:255'],
                'identification_document' => ['required', 'numeric', 'digits_between:7,8', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'gender' => ['required', 'boolean'],
                // 'country' => ['required', 'string', 'max:100'],
                // 'province' => ['required', 'string', 'max:100'],
                // 'city' => ['required', 'string', 'max:100'],
                // 'zip_code' => ['required', 'string', 'max:20'],
                // 'site_reference' => ['required', 'string', 'max:250'],
                // 'phoneCode' => ['required', 'string', 'max:5'],
                // 'phone' => ['required', 'string', 'max:15'],
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ], [
                'required' => 'El campo :attribute es obligatorio.',
                'numeric' => 'El campo :attribute debe ser numérico.',
                'min' => 'El campo :attribute debe tener al menos :min caracteres.',
                'max' => 'El campo :attribute debe tener menos de :max caracteres.',
                'digits_between' => 'El campo :attribute debe tener entre :min y :max caracteres.',
                'digits' => 'El campo :attribute debe tener 10 caracteres.',
                'email' => 'El campo :attribute debe ser un correo electrónico válido.',
                'unique' => 'El :attribute ya ha sido registrado.',
                'confirmed' => 'La confirmación de :attribute no coincide.',
                'boolean' => 'El campo :attribute debe ser verdadero o falso.',
                'accepted' => 'Debes aceptar los términos y condiciones.',
            ])->validate();

            $user = User::create([
                'names' => Str::upper($request['names']),
                'surnames' => Str::upper($request['surnames']),
                'identification_document' => $request['identification_document'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'gender' => $request['gender']
            ]);

            UserDetail::create([
                'user_id' => $user->id,
                'role_id' => RoleUser::where('name', 'admin')->first()->id,
                'country' => 'Venezuela',
                'province' => 'Aragua',
                'city' => 'Maracay',
                'zip_code' => '2700',
                'site_reference' => 'Maracay',
                'phone' => '+584140000000'
                // 'country' => $request['country'],
                // 'province' => $request['province'],
                // 'city' => $request['city'],
                // 'zip_code' => $request['zip_code'],
                // 'site_reference' => $request['site_reference'],
                // 'phone' => $request['phoneCode'].$request['phone']
            ]);

            DB::commit();
            event(new Registered($user));
            Auth::login($user);
            return to_route('dashboard');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
