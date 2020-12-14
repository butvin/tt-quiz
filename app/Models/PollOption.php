<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Lumen\Auth\Authorizable;

use App\Models\Poll;
//use Illuminate\Database\Eloquent\SoftDeletes;


class PollOption extends Model implements AuthenticatableContract, AuthorizableContract
{
    use /*SoftDeletes*/ Authenticatable, Authorizable, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'poll_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'status', 'updated_at', 'created_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
//        'password',
    ];

    /**
     * Relations with polls. Each poll has one poll_option
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function poll(): HasOne
    {
        return $this->hasOne(Poll::class, 'id', 'poll_id');
    }
}
