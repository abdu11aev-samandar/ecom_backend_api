<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentCardType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PaymentCardTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCardType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PaymentCardType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'icon',
    ];
}
