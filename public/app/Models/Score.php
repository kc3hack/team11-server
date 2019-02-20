<?php

namespace App\Models;

/**
 * App\Models\Score
 *
 * @property int $id
 * @property float $value
 * @property int $user_id
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
        'value'
    ];

    public function saveWithUser(User $user): bool
    {
        try {
            \DB::transaction(function () use ($user) {
                $user->save();
                $this->user_id = $user->id;
                $this->save();

                return true;
            });

            return true;
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            return false;
        }
    }

    public function getArrayView(): array
    {
        $user = User::find($this->id);

        return [
            'value' => $this->value,
            'username' => $user->name,
            'user_type' => $user->is_admin
        ];
    }
}
