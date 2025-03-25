<?php

namespace App\Http\Controllers;

use App\Models\Sticky;
use Illuminate\Http\Request;

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
        //
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
