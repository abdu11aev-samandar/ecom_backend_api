<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $result = [
            'stock_id' => $this->id,
            'quantity' => $this->quantity,
            'added_price' => $this->added_price,
        ];

        return $this->getAttributes($result);
    }

    public function getAttributes(array $result): array
    {
        $attributes = json_decode($this->attributes);

        foreach ($attributes as $stockAttribute) {

            $attribute = Attribute::find($stockAttribute->attribute_id);
            $value = Value::find($stockAttribute->value_id);

            $result[$attribute->name] = $value->getTranslation('name');
        }

        return $result;
    }
}
