<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class VitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'typeProducts' => TypeProductController::index(),
            'categoryProducts' => CategoryProductController::index(),
            'materialProducts' => MaterialProductController::index(),
            'colors' => ColorController::index(),
            'sizes'=> SizeController::index(),
            'stickies' => StickyController::index(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/vitals/Show', ['vitals' => $this->index()]);
    }
}
