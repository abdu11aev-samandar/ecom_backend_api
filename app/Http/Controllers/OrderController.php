<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('status_id')) {
            return $this->response(
                OrderResource::collection(auth()->user()->orders()->where('status_id', request('status_id'))->paginate(10))
            );
        }

        return $this->response(
            OrderResource::collection(auth()->user()->orders()->paginate(10))
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);
        $deliveryMethod = DeliveryMethod::findOrFail($request->delivery_method_id);

        foreach ($request['products'] as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {
                /**
                 * Attribute price
                 */

                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();

                $sum += $productResource['discounted_price'] ?? $productResource['price'];
                $sum += $productWithStock->stocks[0]->added_price;
                $products[] = $productResource;
            } else {
                $requestProduct['we_have'] = $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProducts[] = $requestProduct;
            }
        }


        if ($notFoundProducts == [] && $products != [] && $sum != 0) {

            $sum += $deliveryMethod->sum;

            $order = auth()->user()->orders()->create([
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10, // 1 - naqblash, 2 - terminal
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'user_address_id' => $request->user_address_id,
                'comment' => $request->comment,
                'products' => $products,
                'address' => $address,
                'sum' => $sum,
            ]);

            if ($order) {
                foreach ($products as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }
            return $this->success('Order created',
                $order,
            );
        } else {

            return $this->error('Order not created', [
                'not_found_products' => $notFoundProducts,
                'products' => $products,
                'sum' => $sum,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return $this->response(
            new OrderResource($order)
        );
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
        $order->delete();
        return $this->success('Order deleted');
    }
}
