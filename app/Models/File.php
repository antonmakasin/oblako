<?php

namespace App\Models;

use App\Traits\Models\GeneralScopes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use GeneralScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'user_id',
        'size',
        'type',
    ];
}
