<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Lumen\Auth\Authorizable;

use App\Models\Poll;
use App\Models\PollVote;

class PollOption extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

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
        'name',
        /* comment on prod */
        'poll_id',  'parent_id',
        'updated_at', 'created_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'status', 'created_at',
        /* uncomment on prod */
        /*'deleted_at', */
    ];

    /**
     * Relations with polls. Each poll_option has one poll entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class, 'id', 'poll_id');
    }

    /**
     * Every poll_option has one votes data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pollVote(): HasOne
    {
        return $this->hasOne(PollVote::class, 'poll_option_id', 'id');
    }
}
