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
use App\Models\PollOption;

class PollVote extends Model implements AuthenticatableContract, AuthorizableContract
{
    use /*SoftDeletes*/ Authenticatable, Authorizable, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'poll_votes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vote_count', 'updated_at', 'created_at',
    ];

//    /**
//     * Relations with polls. Each poll has one poll_option
//     *
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function poll(): HasOne
//    {
//        return $this->hasOne(Poll::class, 'id', 'poll_id');
//    }
}
