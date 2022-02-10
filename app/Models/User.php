<?php

namespace App\Models;

use App\Traits\Models\GeneralScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use GeneralScopes,
        SoftDeletes,
        HasFactory,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const MIN_PASSWORD_LENGTH = 6;

    private const FILTER = [
        'email' => [
            'type' => 'where',
            'field' => 'email',
            'condition' => 'LIKE',
            'condition_param' => '%',
        ],
    ];
}
