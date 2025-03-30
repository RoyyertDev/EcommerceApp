<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        return Color::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:20', 'unique:colors'],
                'hexadecimal' => ['required', 'string', 'max:6', 'unique:colors'],
            ],[
                'required' => 'El :attribute es obligatorio.',
                'max' => 'El :attribute debe tener menos de :max caracteres.',
                'unique' => 'El :attribute ya existe.',
            ])->validate();
            Color::create([
                'name' => $request->name,
                'hexadecimal' => $request->hexadecimal,
            ]);
            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['colors' => [$e->validator->errors()]])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        //
    }
}
