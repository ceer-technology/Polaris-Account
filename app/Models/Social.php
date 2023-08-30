<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'socials';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.应该为数组隐藏的属性。
     *
     * @var array
     */
    protected $hidden = [
        'provider_token',
        'provider_refresh_token',
    ];

    /**
     * The attributes that should be mutated to dates.应为日期的属性。
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
        'provider_token',
        'provider_refresh_token',
        'provider_username',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'provider' => 'string',
        'provider_id' => 'string',
        'provider_token' => 'string',
        'provider_refresh_token' => 'string',
        'provider_username' => 'string',
    ];

    /**
     * Get the user that owns the Social
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
