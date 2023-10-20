<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product)
    {
        foreach ($request->photos as $photo) {
            $path = $photo->store('products/' . $product->id, 'public');
            $full_name = $photo->getClientOriginalName();

            $product->photos()->create([
                'path' => $path,
                'full_name' => $full_name,
            ]);
        }

        return $this->success('Photos Uploaded Successfully');
    }

    public function destroy(Product $product, Photo $photo)
    {
        Gate::authorize('delete', $product);

        Storage::delete($photo->path);
        $photo->delete();

        return $this->success('Photo Deleted Successfully');
    }
}
