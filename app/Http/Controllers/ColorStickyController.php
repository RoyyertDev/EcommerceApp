<?php

namespace App\Http\Controllers;

use App\Models\ColorSticky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ColorStickyController extends Controller
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
                'sticky_id' => ['required', 'exists:stickies,id'],
                'color_id' => ['required', 'exists:colors,id'],
            ])->validate();
            $color_sticky = ColorSticky::create([
                'sticky_id' => $request['sticky_id'],
                'color_id' => $request['color_id'],
            ]);
            DB::commit();
            return $color_sticky->id;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ColorSticky $colorSticky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ColorSticky $colorSticky)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ColorSticky $colorSticky)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ColorSticky $colorSticky)
    {
        //
    }
}
