<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'users' => UserController::index()->count(),
            'products' => ProductController::index()->count(),
            'variants' => VariantController::index()->count(),
            'typeProducts' => TypeProductController::index()->count(),
            'categoryProducts' => CategoryProductController::index()->count(),
            'materialProducts' => MaterialProductController::index()->count(),
            'colors' => ColorController::index()->count(),
            'sizes'=> SizeController::index()->count(),
            'stickies' => StickyController::index()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/Dashboard', ['widgetCount' => $this->index()]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
