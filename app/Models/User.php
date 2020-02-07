<?php

namespace App\Models;

use App\KopiHelper\Common;
use App\KopiHelper\Registry;
use App\Models\Master\Unit;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_pickname', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*------------ relations to other model -----------------*/
    public function groupPermission()
    {
        return $this->hasOne(ViewPermissionGrup::class, 'groupid', 'groupid');
    }

    public function access()
    {
        return $this->hasMany(MenuAccess::class, 'id_pengguna_grup', 'groupid');
    }

    public function grup()
    {
        return $this->belongsTo(UserGroup::class, "groupid");
    }

    /*------------- end : relations to other model --------------------*/


    public function login(string $username, $password)
    {
        return Auth::attempt(["user_pickname" => $username, "password" => $password]);
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    /*public function scopeBagian($query, $bagian)
    {
        return $query->where('BAGIAN', $bagian);
    }*/


    public static function getById($id){
        $user = new self;

        return $user->where("id", "=", $id)->first();
    }

    public static function getByUsername($username){
        return self::where('user_pickname', '=', $username)->first();
    }

}
