<?php

namespace App\Models;

/**
 * App\Models\Tatekan
 *
 * @property int $id
 * @property string $uri
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tatekan whereUri($value)
 * @mixin \Eloquent
 */
class Tatekan extends \Eloquent
{
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uri'
    ];

    /**
     * 配列形式のViewを生成する。
     *
     * @return array
     */
    public function getArrayView(): array
    {
        return [
            'uri' => $this->uri
        ];
    }
}
