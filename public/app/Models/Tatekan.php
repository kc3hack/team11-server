<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tatekan
 * @package App\Models
 * @property integer id
 * @property string uri
 * @property \DateTime created_at
 */
class Tatekan extends Model
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
}
