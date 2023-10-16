<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name'),
            'price' => $this->price,
            'description' => $this->getTranslation('description'),
            'category' => new CategoryResource($this->category),
            'inventory' => StockResource::collection($this->stocks),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
