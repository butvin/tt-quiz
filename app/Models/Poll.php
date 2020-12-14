<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Lumen\Auth\Authorizable;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\PollOption;
use App\Models\PollVote;


class Poll extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'polls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'status', 'updated_at', 'created_at',
    ];

    /**
     * Define the primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Options are associated with the specific poll
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pollOptions(): HasMany
    {
        return $this->hasMany(PollOption::class, 'poll_id', 'id');
    }
}
