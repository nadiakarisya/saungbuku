<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 28-Feb-19
 * Time: 12:57
 */

namespace App\Services;


use App\Models\PermissionGrup;
use App\Models\UserGroup;

class UserGroupService
{

    public static function create($data){
        $usergroup = new UserGroup();
        $permission = $data["permission"] ?? array();

        unset($data["permission"]);
        $usergroup->insertUsergroup($data);

        if($permission){
            $pg = new PermissionGrup();
            $pg->insertMulti($usergroup->id, $permission);
        }
    }

    public static function update(string $id, $data){
        $usergroup = new UserGroup();
        $permission = $data["permission"] ?? array();

        unset($data["permission"]);
        $usergroup->updateUsergroup($id, $data);

        if($permission){
            $pg = new PermissionGrup();
            $pg->deleteMultiByGroupid($id);
            $pg->insertMulti($id, $permission);
        }
    }
}