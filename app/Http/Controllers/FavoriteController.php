<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return auth()->user()->favorites()->paginate(20);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        auth()->user()->favorites()->attach($request->product_id);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param int $favorite_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($favorite_id)
    {
        if (auth()->user()->hasFavorite($favorite_id)) {
            auth()->user()->favorites()->detach($favorite_id);

            return response()->json(['message' => 'Removed from favorites']);
        }

        return response()->json([
            'success' => false,
            'message' => 'Favorite not found'
        ]);
    }
}
