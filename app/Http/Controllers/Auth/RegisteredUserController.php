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
                'names' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
                'surnames' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
                'identification_document' => ['required', 'numeric', 'digits_between:7,8', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[\w.+-]+@[\w.-]+\.(com|es|net)$/i'],
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
                // Mensajes para names
                'names.required' => 'El nombre es obligatorio.',
                'names.string' => 'El nombre debe ser un texto válido.',
                'names.max' => 'El nombre no debe superar los 255 caracteres.',
                'names.regex' => 'El nombre solo puede contener letras y espacios.',

                // Mensajes para surnames
                'surnames.required' => 'El apellido es obligatorio.',
                'surnames.string' => 'El apellido debe ser un texto válido.',
                'surnames.max' => 'El apellido no debe superar los 255 caracteres.',
                'surnames.regex' => 'El apellido solo puede contener letras y espacios.',

                // Mensajes para identification_document
                'identification_document.required' => 'El documento de identificación es obligatorio.',
                'identification_document.numeric' => 'El documento de identificación debe ser numérico.',
                'identification_document.digits_between' => 'El documento de identificación debe tener entre 7 y 8 dígitos.',
                'identification_document.unique' => 'El documento de identificación ya está registrado.',

                // Mensajes para email
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.string' => 'El correo electrónico debe ser un texto válido.',
                'email.email' => 'El correo electrónico debe tener un formato válido.',
                'email.max' => 'El correo electrónico no debe superar los 255 caracteres.',
                'email.unique' => 'El correo electrónico ya está registrado.',
                'email.regex' => 'Debe usar un dominio válido (.com, .es o .net).',

                // Mensajes para password
                'password.required' => 'La contraseña es obligatoria.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',

                // Mensajes para gender
                'gender.required' => 'El género es obligatorio.',
                'gender.boolean' => 'El género debe ser verdadero o falso.',

                // Mensajes para terms (términos y condiciones)
                'terms.accepted' => 'Debes aceptar los términos y condiciones.',
                'terms.required' => 'Debes aceptar los términos y condiciones.',
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
                'role_id' => RoleUser::where('name', 'admin')->value('id'),
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
