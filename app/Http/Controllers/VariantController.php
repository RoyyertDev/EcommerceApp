<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Sticky;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product)
    {
        return Variant::with([
            'product',
            'characteristic.colorSticky.color',
            'characteristic.colorSticky.sticky',
            'characteristic.size',
        ])->where('product_id', $product)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        $stickies = Sticky::all();
        $colors = Color::all();
        $sizes = Size::all();
        return Inertia::render('admin/variants/Show', [
            'variants' => $this->index($product->id),
            'product' => $product,
            'stickies' => $stickies,
            'colors' => $colors,
            'sizes' => $sizes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'sticky' => ['required', 'exists:stickies,id'],
                'color' => ['required', 'exists:colors,id'],
                'size' => ['required', 'exists:sizes,id'],
                'image' => ['required'],
                'price' => ['required', 'numeric', 'min:0'],
                'stock' => ['required', 'numeric', 'min:0', 'integer'],
                'promotion' => ['required', 'boolean'],
                'discount' => ['required', 'numeric'],
            ])->validate();
            $color_sticky_id = ColorStickyController::store([
                'sticky_id' => $request['sticky'],
                'color_id' => $request['color'],
            ]);
            $characteristic_id = CharacteristicController::store([
                'color_sticky_id' => $color_sticky_id,
                'size_id' => $request['size']
            ]);
            Variant::create([
                'product_id' => $product->id,
                'characteristic_id' => $characteristic_id,
                'image' => $request['image'],
                'price' => $request['price'],
                'stock' => $request['stock'],
                'promotion' => $request['promotion'],
                'discount' => $request['discount'],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variant $variant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variant $variant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant)
    {
        //
    }
}
