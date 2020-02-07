<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'pengguna_grup';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class, "groupid");
    }

    public function combinedGroup()
    {
        return $this->hasOne(ViewPermissionGrup::class, 'groupid', 'id');
    }

    public function permissions(){
        return $this->hasMany(PermissionGrup::class,'grup_id', 'id');
    }

    public function insertUsergroup(array $insertData){
        $this->fill($insertData);
        $this->save();
    }

    public function updateUsergroup(string $groupId, array $updateData){
        $vendor = $this->find($groupId);
        $vendor->fill($updateData);
        $vendor->save();
    }

}
