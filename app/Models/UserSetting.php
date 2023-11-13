<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property int $setting_id
 * @property int|null $value_id
 * @property int|null $switch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Setting $setting
 * @property-read \App\Models\Value|null $value
 * @method static \Database\Factories\UserSettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereValueId($value)
 * @mixin \Eloquent
 */
class UserSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    public function value(): BelongsTo
    {
        return $this->belongsTo(Value::class);
    }
}
