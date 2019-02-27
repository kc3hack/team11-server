<?php

namespace App\Models;

/**
 * App\Models\Score
 *
 * @property int $id
 * @property float $value
 * @property string $username
 * @property string $user_type
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Score whereValue($value)
 * @mixin \Eloquent
 */
class Score extends \Eloquent
{
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'username', 'user_type'
    ];

    /**
     * 配列形式のViewを生成する。
     *
     * @return array
     */
    public function getArrayView(): array
    {
        return [
            'value' => $this->value,
            'username' => $this->username,
            'user_type' => $this->user_type
        ];
    }
}
