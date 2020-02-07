<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGrup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission_grup';

    protected $primaryKey = null;
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


    public function insertMulti(string $groupId, $data){
        foreach ($data as $k => $permission_id){
            $p = new PermissionGrup();
            $p->grup_id = $groupId;
            $p->permission_id = $permission_id;
            $p->save();
        }
    }

    public function deleteMultiByGroupid(string $groupId){
        $p = new PermissionGrup();
        $p->where("grup_id", "=", $groupId)->delete();
    }
}