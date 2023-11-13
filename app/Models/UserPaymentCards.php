<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserPaymentCards
 *
 * @property int $id
 * @property int $user_id
 * @property int $payment_card_type_id
 * @property string|null $name
 * @property string $number
 * @property string $last_four_numbers
 * @property string $exp_date
 * @property string $holder_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PaymentCardType $type
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\UserPaymentCardsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereExpDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereLastFourNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards wherePaymentCardTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPaymentCards whereUserId($value)
 * @mixin \Eloquent
 */
class UserPaymentCards extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_card_type_id',
        'name',
        'number',
        'last_four_numbers',
        'exp_date',
        'holder_name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PaymentCardType::class, 'payment_card_type_id', 'id');
    }
}
