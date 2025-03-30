<?php

namespace App\Http\Controllers;

use App\Models\MaterialProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MaterialProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        return MaterialProduct::all();
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
                'name' => ['required', 'string', 'max:20', 'unique:material_products'],
            ],[
                'required' => 'El nombre es obligatorio.',
                'max' => 'El nombre debe tener menos de :max caracteres.',
                'unique' => 'El nombre ya existe.',
            ])->validate();
            MaterialProduct::create($request->only('name'));
            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['materialProducts' => [$e->validator->errors()]])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialProduct $materialProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialProduct $materialProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaterialProduct $materialProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialProduct $materialProduct)
    {
        //
    }
}
