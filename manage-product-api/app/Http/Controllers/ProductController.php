<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images')->get();
        return response()->json($products);
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
    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->stock = $request->stock ?? 0;
            $product->status = $request->status ?? 0;
            $product->save();

            if ($request->hasFile('images')) {
                $imageCount = 1;

                foreach ($request->file('images') as $image) {
                    $extension = $image->getClientOriginalExtension();
                    $customName = time() . '_' . $imageCount . '.' . $extension;
                    $path = $image->storeAs('product_images', $customName, 'public');

                    $productImages = new ProductImages();
                    $productImages->product_id = $product->id;
                    $productImages->image_path = $path;
                    $productImages->save();

                    $imageCount++;
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product->load('images')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 500);
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            foreach ($product->images as $image) {
                if (FacadesStorage::disk('public')->exists($image->image_path)) {
                    FacadesStorage::disk('public')->delete($image->image_path);
                }
            }

            ProductImages::where('product_id', $product->id)->delete();

            $product->delete();

            DB::commit();

            return response()->json([
                'message' => 'Product and associated images deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to delete product',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
