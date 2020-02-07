<?php

namespace App\Http\Controllers\Administrator;

use App\Models\SettingData;
use App\Services\SettingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function indexWilayah()
    {
        $this->authorize(authz(106));
        return view("administrator.setting.adminwilayah.index");
    }

    public function saveUserAsAdminWilayah(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->except("_token");

            SettingService::saveUserAsAdminWilayahByUnitap($data["userid"], $data["unitap"]);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }

    public function saveUserAsPenandaTangan(Request $request)
    {
        try {
            DB::beginTransaction();

            $unitap = Auth::user()->unit;

            $user = $request->except("_token");

            SettingService::saveUserAsPenandatanganByUnitap($user, $unitap);

            DB::commit();

            return json_encode("");
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }

    public function getSetting($key, $kdwil)
    {
        return SettingData::getByKeyAndKdwil($key, $kdwil);
    }
}
