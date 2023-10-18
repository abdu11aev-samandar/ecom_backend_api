<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPaymentCardsRequest;
use App\Http\Requests\UpdateUserPaymentCardsRequest;
use App\Http\Resources\UserPaymentCardResource;
use App\Models\UserPaymentCards;

class UserPaymentCardsController extends Controller
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
        return $this->response(UserPaymentCardResource::collection(auth()->user()->paymentCards));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPaymentCardsRequest $request)
    {
        $card = auth()->user()->paymentCards()->create([
            'payment_card_type_id' => $request->payment_card_type_id,
            'name' => encrypt($request->name),
            'number' => encrypt($request->number),
            'last_four_numbers' => encrypt(substr($request->number, -4)),
            'exp_date' => encrypt($request->exp_date),
            'holder_name' => encrypt($request->holder_name),
        ]);

        return $this->success('Payment card created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPaymentCards $userPaymentCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPaymentCards $userPaymentCards)
    {
        //
    }
}
