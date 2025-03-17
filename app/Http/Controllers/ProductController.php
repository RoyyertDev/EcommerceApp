<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\MaterialProduct;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with('typeProduct', 'categoryProduct', 'materialProducts')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/products/Show', [
            'products' => $this->index(),
            'types' => TypeProduct::all(),
            'categories' => CategoryProduct::all(),
            'materials' => MaterialProduct::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:100'],
                'type_product_id' => ['required', 'exists:type_products,id'],
                'category_product_id' => ['required', 'exists:category_products,id'],
                'material_product_id' => ['required', 'exists:material_products,id'],
                'description' => ['required', 'string', 'max:250'],
            ])->validate();
            Product::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:100'],
                'type_product_id' => ['required', 'exists:type_products,id'],
                'category_product_id' => ['required', 'exists:category_products,id'],
                'material_product_id' => ['required', 'exists:material_products,id'],
                'description' => ['required', 'string', 'max:250'],
            ])->validate();
            $product->update($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
