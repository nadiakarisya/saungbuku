<?php

namespace App\Models;

use App\KopiHelper\Common;
use App\KopiHelper\Registry;
use App\Exceptions\DataNotFoundException;
use App\Models\Master\Unit;
use IamPln\SsoUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User2 extends Authenticatable
{
    use Notifiable;
    use SsoUser;

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

    public function getByLevelAndUnit(string $level, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("unit", "=", $unit)
            ->first()
            ;
    }

    public function getByLevelAndBagian(string $level, string $bagian,string $unitap){
        $masterunit = new Unit();
        return $this
            ->leftJoin('masterunit',$this->table.'.unit','=','masterunit.unitap')
            ->where($this->table . ".level", "=", $level)
            ->where($this->table . ".bagian", "=", $bagian)
            ->where("masterunit.kdwil", "=", ($masterunit->getKdWilByUnitAp($unitap)))
            ->first()
            ;
    }
    public function getByLevelAndBagianAndUnit(string $level, string $bagian, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("bagian", "=", $bagian)
            ->where("unit", "=", $unit)
            ->first()
            ;
    }

    public function getByLevelAndBagianAndUnitAndSubbag(string $level, string $bagian, string $unit, string $subbag){
        return $this
            ->where("level", "=", $level)
            ->where("bagian", "=", $bagian)
            ->where("unit", "=", $unit)
            ->where("sub_bag", "=", $subbag)
            ->first()
            ;
    }

    public function getByLevelAndUnitAndNotif(string $level, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("unit", "=", $unit)
//            ->where("notif", "=", 'Y')
            ->first()
            ;
    }

    public function getByLevelAndBagianAndUnitAndNotif(string $level, string $bagian, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("bagian", "=", $bagian)
            ->where("unit", "=", $unit)
//            ->where("notif", "=", 'Y')
            ->first()
            ;
    }
    public function getByLevelAndApproveRole(string $level, string $approverole, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("approverole", "=", $approverole)
            ->where("unit", "=", $unit)
            //            ->where("notif", "=", 'Y')
            ->first()
            ;
    }

    public function getByLevelAndPrivAndUnit(string $level, string $priv, string $unit){
        return $this
            ->where("level", "=", $level)
            ->where("priv", "=", $priv)
            ->where("unit", "=", $unit)
            ->first()
            ;
    }

    public function getByLevel(string $level,string $unitap){
        $masterunit = new Unit();
        return $this
            ->leftJoin('masterunit',$this->table.'.unit','=','masterunit.unitap')
            ->where($this->table . ".level", "=", $level)
            ->where("masterunit.kdwil", "=", ($masterunit->getKdWilByUnitAp($unitap)))
            ->first()
            ;
    }

    public static function getDistinctApproverole(){
        return User::selectRaw('distinct approverole')
            ->groupBy("approverole")
            ->get()
            ;
    }

    public static function getById($id){
        $user = new self;

        return $user->where("id", "=", $id)->first();
    }

    public static function getByUsername($username){
        return self::where('user_pickname', '=', $username)->first();
    }

    public static function getByGroupIdAndUnit($groupId,$unit){
        return self::where('groupid', '=', $groupId)
            ->where('unit', '=', $unit)
            ->first();
    }

    public static function getByUnit(string $unit){
        return self::where("unit", "=", $unit)
            ->orderBy('nama_lengkap', 'asc')
            ->get()
            ;
    }


    /**
     * get unit induk dari user ybs
     * @return unit model
     */
    public function getUnitInduk(){
        return $this->tunit->getUnitInduk();
    }

    public function getUnit(){
        return $this->tunit ?? null;
    }

    /**
     * mengembalikan kode wilayah format 2 digit dari user ybs
     * @return bool|string
     */
    public function shortKodeWil(){
        return substr($this->unit,0,2);
    }

    /**
     * mengembalikan kode wilayah format 4 digit dari user ybs
     * @return string
     */
    public function kodeWil() {
        return Common::getKodeWilayah($this->unit);
    }

    /**
     * true jika unit dari usesr ybs adalah unit induk wilayah
     * @return bool
     */
    public function isUserUnitInduk(){
        return $this->tunit->isUnitInduk();
    }

    public function isUserUnitPusat(){
        return $this->tunit->isUnitPusat();
    }

    public function isAdminPusat(){
        return $this->groupid == 1;
    }

    public function isAdminWilayah(){

        $kdwil = $this->kodeWil();

        $result = SettingData::getByKeyAndKdwil(Registry::SETTING_KEY_ADMIN_WILAYAH, $kdwil);

        return ($result != null && $result->values == $this->id);
    }
}
