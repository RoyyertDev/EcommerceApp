<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public static function store(Array $request)
    {
        DB::beginTransaction();
        try {
            Validator::make($request, [
                'color_sticky_id' => ['required', 'exists:color_sticky,id'],
                'size_id' => ['required', 'exists:sizes,id'],
            ])->validate();
            $characteristic = Characteristic::create([
                'color_sticky_id' => $request['color_sticky_id'],
                'size_id' => $request['size_id']
            ]);
            DB::commit();
            return $characteristic->id;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Characteristic $characteristic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Characteristic $characteristic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update(Array $request, $characteristic_id)
    {
        DB::beginTransaction();
        try {
            Validator::make($request, [
                'size_id' => ['required', 'exists:sizes,id'],
            ])->validate();
            Characteristic::findOrFail($characteristic_id)->update([
                'size_id' => $request['size_id'],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Characteristic $characteristic)
    {
        //
    }
}
