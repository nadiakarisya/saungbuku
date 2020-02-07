<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewPermissionGrup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'view_permission_group';

    /**
     *
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     *
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [];
}