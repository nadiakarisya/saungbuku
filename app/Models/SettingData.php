<?php

namespace App\Models;

use App\KopiHelper\Registry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingData extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'setting_data';

    protected $primaryKey = ["key", "kdwil"];

    public $timestamps = false;

    public $incrementing = false;

    public $guarded = [];

    public static function getByKeyAndKdwil(string $key, string $kodeWilayah = null, string $unitap = null)
    {
        $model = self::where("key", $key);

        if($unitap != null) {
            $model->where("unitap", $unitap);
        }
        if($kodeWilayah != null){
            $model->where("kdwil", $kodeWilayah);
        }

        $result = $model->first();

        return $result;
    }

    public static function getByKeyAndUnitap(string $key, string $unitap)
    {
        return self::where("key", $key)
            ->where("unitap", $unitap)
            ->first();
    }

    public static function listByWilayah(string $kodeWilayah, bool $excludeAdminWilayahKey)
    {
        $self = self::where("kdwil", $kodeWilayah);

        if($excludeAdminWilayahKey){
            $self->where("key", "!=", Registry::SETTING_KEY_ADMIN_WILAYAH);
        }

        return $self->get();
    }

    public static function listAll(bool $excludeAdminWilayahKey)
    {

        if($excludeAdminWilayahKey){
            return self::where("key", "!=", Registry::SETTING_KEY_ADMIN_WILAYAH)->get();
        }

        return self::get();
    }

    public function insertSetting(array $insertData){
        $this->fill($insertData);
        $this->save();
    }

    public function deleteSetting(string $key, string $kdwil){
        DB::table($this->table)
            ->where("key", '=', $key)
            ->where("kdwil", '=', $kdwil)
            ->delete();
    }

    public function showSettingDetail(string $key, string $kdwil){
        return self::where("key", $key)
            ->where("kdwil", $kdwil)
            ->first();
    }
}
