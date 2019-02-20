<?php

namespace App\Models;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property bool $is_admin
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @mixin \Eloquent
 */
class User extends \Eloquent
{
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_admin'
    ];

    /**
     * ユーザーの種類を取得する
     *
     * @param  string  $value
     * @return string
     */
    public function getIsAdminAttribute(string $value): string
    {
        return $value ? 'admin' : 'student';
    }

    /**
     * ユーザーの種類を設定する
     *
     * @param  string  $value
     * @return void
     */
    public function setIsAdminAttribute($value)
    {
        $this->attributes['is_admin'] = $value === 'admin';
    }
}
