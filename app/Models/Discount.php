<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'percent',
        'sum',
        'from',
        'to',
    ];

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // getDiscount
    public function getDiscount()
    {
        if ($this->discount) {
            if ($this->discount->from == null && $this->discount->from == null) {
                return $this->discount;
            }
            if (Carbon::now()->between(Carbon::parse($this->discount->from), Carbon::parse($this->discount->to))) {
                return $this->discount;
            }
        }
    }
}
