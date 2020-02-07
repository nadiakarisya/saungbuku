<?php

namespace App\Services;


use App\KopiHelper\Registry;
use App\Models\Master\Unit;
use App\Models\PermissionGrup;
use App\Models\SettingData;
use App\Models\User;


class SettingService
{
    public static function saveUserAsAdminWilayahByUnitap(string $userId, string $unitAp){

        $kdwil = (new Unit)->getKdWilByUnitAp($unitAp);
        $modelSetting = new SettingData();
        $data = array(
            "key" => Registry::SETTING_KEY_ADMIN_WILAYAH,
            "kdwil" => $kdwil,
            "values" => $userId
        );

        $modelSetting->deleteSetting($data["key"], $data["kdwil"]);
        $modelSetting->insertSetting($data);
    }

    public static function saveUserAsPenandaTanganByUnitap(array $users, string $unitAp){

        $kdwil = (new Unit)->getKdWilByUnitAp($unitAp);
        $data = array(
            array(
                "key" => Registry::SETTING_KEY_PENANDATANGAN_1,
                "kdwil" => $kdwil,
                "values" => $users["user1"]
            ),
            array(
                "key" => Registry::SETTING_KEY_PENANDATANGAN_2,
                "kdwil" => $kdwil,
                "values" => $users["user2"]
            )
        );

        foreach($data as $index => $d){
            $modelSetting = new SettingData();
            $modelSetting->deleteSetting($d["key"], $d["kdwil"]);
            $modelSetting->insertSetting($d);
        }
    }

    public static function updateSetting(array $data){

        $modelSetting = new SettingData();

        $modelSetting->deleteSetting($data["key"], $data["kdwil"]);
        $modelSetting->insertSetting($data);
    }

    private static function getValue(string $key, string $unitap = null, string $kdwil = null){
        $setting = SettingData::getByKeyAndKdwil($key, $kdwil, $unitap)->values;

        return $setting;
    }

    public static function isUseVfm(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_VFM_USE, null, $kdwil);
    }

    public static function minVfmRks(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_VFM_RKS_MIN, null, $kdwil);
    }

    public static function minVfmKontrak(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_VFM_KONTRAK_MIN, null, $kdwil);
    }

    public static function minApprovalGm(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_BATAS_NILAI_APPROVAL_GM, null, $kdwil);
    }

    public static function batasHariApprovalNotadinas(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_BATAS_HARI_APPROVAL_NOTADINAS, null, $kdwil);
    }

    public static function batasHariApprovalRks(string $kdwil){
        return self::getValue(Registry::SETTING_KEY_BATAS_HARI_APPROVAL_RKS, null, $kdwil);
    }

    public static function tahunTransaksi(){
        return self::getValue(Registry::SETTING_KEY_TAHUN_TRANSAKSI, null, null);
    }

    public static function getUserPenandaTanganByWilayah(string $kdwil){
        return array(
            User::getById(self::getValue(Registry::SETTING_KEY_PENANDATANGAN_1, null, $kdwil)),
            User::getById(self::getValue(Registry::SETTING_KEY_PENANDATANGAN_2, null, $kdwil))
        );
    }

}