<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDetail;
use App\Models\RoleUser;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with('detail')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->index();
        return Inertia::render('admin/users/Show', ['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        DB::beginTransaction();
        try {
                Validator::make($request->all(), [
                'names' => ['required', 'string', 'max:255'],
                'surnames' => ['required', 'string', 'max:255'],
                'identification_document' => ['required', 'string', 'max:255', 'unique:users'],
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
            ]);          DB::commit();
            /* event(new Registered($user)); */
            /* return to_route('dashboard'); */
            } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
    }
}
