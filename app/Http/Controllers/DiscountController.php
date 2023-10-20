<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(
            Discount::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request)
    {
        if (Discount::query()->where('product_id', $request->product_id)->exists()) {
            return $this->error('Discount already exists');
        }

        $discount = Discount::create($request->validated());

        return $this->success('Discount created successfully',
            $discount
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return $this->response(
            $discount
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return $this->success('Discount updated successfully',
            $discount
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return $this->success('Discount deleted successfully');
    }
}
