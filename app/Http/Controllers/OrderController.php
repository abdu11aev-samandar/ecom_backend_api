<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return auth()->user()->orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $sum = 100;
        $products = Product::query()->limit(2)->get();
        $address = UserAddress::find($request->address_id);

        auth()->user()->orders()->create([
            'delivery_method_id' => $request->delivery_method_id,
            'payment_type_id' => $request->payment_type_id,
            'user_address_id' => $request->user_address_id,
            'comment' => $request->comment,
            'products' => $products,
            'address' => $address,
            'sum' => $sum,
        ]);

        return response()->json([
            'message' => 'Order created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
