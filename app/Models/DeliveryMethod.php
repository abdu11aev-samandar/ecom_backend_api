<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\DeliveryMethod
 *
 * @property int $id
 * @property array $name
 * @property array $estimated_time
 * @property int $sum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Database\Factories\DeliveryMethodFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereEstimatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod withoutTrashed()
 * @mixin \Eloquent
 */
class DeliveryMethod extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'estimated_time',
        'sum',
    ];

    public array $translatable = [
        'name',
        'estimated_time',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
