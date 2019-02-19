<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 * @package App\Models
 * @property integer id
 * @property float value
 * @property User
 * @property \DateTime created_at
 */
class Score extends Model
{
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    /**
     * ユーザーに関連する電話レコードを取得
     */
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
