<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Value
 *
 * @property int $id
 * @property string $valueable_type
 * @property int $valueable_id
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $valueable
 * @method static \Database\Factories\ValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Value newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Value newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Value query()
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereValueableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereValueableType($value)
 * @mixin \Eloquent
 */
class Value extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'added_price',
    ];

    public array $translatable = ['name'];

    public function valueable(): BelongsTo
    {
        return $this->morphTo();
    }
}
