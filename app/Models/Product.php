<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

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

    // withStock() method
    public function withStock($stock): static
    {
        $this->stocks = [$this->stocks()->findOrFail($stock)];
        return $this;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
