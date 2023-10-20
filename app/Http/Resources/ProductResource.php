<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->getDiscount()) {
            if ($this->discount->sum) {
                $discountPrice = $this->price - $this->discount->sum;
            } elseif ($this->discount->percent) {
                $discountPrice = $this->price - ($this->price * $this->discount->percent / 100);
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name'),
            'price' => $this->price,
            'description' => $this->getTranslation('description'),
            'category' => new CategoryResource($this->category),
            'inventory' => StockResource::collection($this->stocks),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'order_quantity' => $this->when(isset($this->quantity), $this->quantity),
            'photos' => PhotoResource::collection($this->photos),
            'discount' => $this->getDiscount(),
            'discounted_price' => $discountPrice ?? null,
        ];
    }
}
