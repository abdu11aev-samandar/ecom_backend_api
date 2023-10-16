<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'category_id', // <-- Add this line
        'name',
        'price',
        'description'
    ];

    public array $translatable = ['name', 'description'];

    // category() method
    public function category(): BelongsTo // <-- Add this method
    {
        return $this->belongsTo(Category::class);
    }

    // stocks() method
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
