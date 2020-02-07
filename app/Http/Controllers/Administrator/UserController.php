<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Master\Bidang;
use App\Models\User;
use App\Models\UserGroup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected $user;
    protected $unit;

    public function __construct()
    {
        $this->user = new User();
        parent::__construct();
    }

    public function index()
    {
        return view('administrator/user/index');
    }

    public function datatableData()
    {
        $user = Auth::user();
        $v = User::all();

        return Datatables::of($v)
                        ->addColumn('grup', function (User $user) {
                            return $user->grup ? $user->grup->nama : '';
                        })
                        ->make();
    }

    public function create()
    {
        $group = UserGroup::get();

        return view('administrator/user/create')
            ->with("group", $group);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->post();//post

            unset($data["_token"], $data["_method"]);

            foreach ($data as $k => $v){
                $this->user->$k = $v;
            }
            $group = $data["level"];
            $this->user->groupid = $group;

            $this->user->user_pickname = strtoupper($this->user->user_pickname);

            $this->user->password = Hash::make("123");

            $this->user->notif  = "Y";

            $this->user->save();
        }
        catch (Exception $e) {
            return redirect()->back()->with('errormessage', $e->getMessage());
        }

        return redirect()->action('Administrator\UserController@index');
    }

    public function edit($id)
    {
        if(!Auth::user()->isAdminWilayah() && !Auth::user()->isAdminPusat()){
            $this->authorize(authz(102));
        }
        try {
            $user = $this->user->findOrFail($id);
            if(Auth::user()->isAdminPusat()){
                $rowUnit = Unit::all();
            }else if(Auth::user()->isAdminWilayah()){
                $unitUser = Auth::user()["unit"];
                $rowUnit = $this->unit->listByWilayah($unitUser);
            }

        }
        catch (Exception $e) {
            return redirect()->action('Administrator\UserController@index')->with("errormessage", $e->getMessage());
        }

        return view('administrator/user/edit')->with("user", $user)->with("rowUnit", $rowUnit);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $data = $request->post();

            unset($data["_token"], $data["_method"]);

            foreach ($data as $k => $v){
                $user->$k = $v;
            }

            $user->save();
        }
        catch (Exception $e) {
            return redirect()->back()->with('errormessage', $e->getMessage());
        }

        return redirect()->action('Administrator\UserController@index');
    }

    public function getByUnit(string $unitap)
    {
        $unit = User::getByUnit($unitap);

        return response()->json($unit);
    }

    public function getLevel($unitid)
    {
        $unit = new Unit();
        $u = $unit->getByUnitap($unitid);
        $rowData = UserGroup::where("lvl_user","Y")->where("unit","=", $u->level)->orderBy("nama")->get();

        return response()->json( $rowData );
    }

    public function getBidang($levelid, $unitid)
    {
        $unit = new Unit();
        $u = $unit->getByUnitap($unitid);

        if($u->level == 1){
            $user_bidang = array('5','7','11');
            $keuangan	 = array('3','4');

            if (in_array($levelid, $user_bidang )){
                $rowBidang = Bidang::level($u->level)->orderBy("kdbidang")->get();
                foreach ($rowBidang as $bidang){
                        $return[$bidang->kdbidang] = $bidang->nmbidang;
                }
            }else if(in_array($levelid, $keuangan)){
                $return["KEUANGAN"] = "-SEMUA BIDANG | OTORISASI KEUANGAN-";
            }else{
                $return["ALL"] = "-SEMUA BIDANG-";
            }
        }
        else{
            $user_bidang = array('14','15','17');
            if (in_array($levelid, $user_bidang )){
                $rowBidang = Bidang::level($u->level)->orderBy("kdbidang")->get();
                foreach ($rowBidang as $bidang){
                    $return[$bidang->kdbidang] = $bidang->nmbidang;
                }
            }else{
                $return["ALL"] = "-SEMUA BIDANG-";
            }
        }

        return response()->json( $return );
    }
}
