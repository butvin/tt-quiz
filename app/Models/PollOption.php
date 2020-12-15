<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Lumen\Auth\Authorizable;

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
        'name', 'status',
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
     * Relations with polls. Each poll has one poll_option
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class, 'id', 'poll_id');
    }
}
