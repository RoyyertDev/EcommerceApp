<?php

namespace App\Http\Controllers;

use App\Models\Sticky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StickyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        return Sticky::all();
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
                'name' => ['required', 'string', 'max:20', 'unique:stickies'],
            ],[
                'required' => 'El nombre es obligatorio.',
                'max' => 'El nombre debe tener menos de :max caracteres.',
                'unique' => 'El nombre ya existe.',
            ])->validate();
            Sticky::create($request->only('name'));
            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['stickies' => [$e->validator->errors()]])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sticky $sticky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sticky $sticky)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sticky $sticky)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sticky $sticky)
    {
        //
    }
}
