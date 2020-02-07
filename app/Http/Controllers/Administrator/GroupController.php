<?php

namespace App\Http\Controllers\Administrator;

use App\KopiHelper\PermissionRegistry;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\UserGroup;
use App\Services\UserGroupService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GroupController extends Controller
{
    protected $usergroup;
    protected $menu;

    public function __construct()
    {
        $this->usergroup = new UserGroup();
        $this->menu = new Menu();
        parent::__construct();
    }

    public function index()
    {
        $this->authorize(authz(101));
        return view('administrator/group/index');
    }

    public function datatableData()
    {
        $v = $this->usergroup->get();
        return Datatables::of($v)->make();
    }

    public function create()
    {
        $this->authorize(authz(101));
        try {
            $listPermission = PermissionRegistry::getPermissionsList();
        }
        catch (Exception $e) {
            return redirect()->action('Administrator\GroupController@index')->with("errormessage", $e->getMessage());
        }
        return view('administrator/group/create')->with("listPermission", $listPermission);
    }

    public function store(Request $request)
    {
        $redirect = redirect()->action('Administrator\GroupController@index');

        try {
            DB::beginTransaction();
            $data = $request->except("_token");
            $data["lvl_user"] = "Y";

            UserGroupService::create($data);

            DB::commit();

            $redirect->with("successmessage", "Grup Pengguna berhasil disimpan!");
        }
        catch (Exception $e) {
            DB::rollBack();
            return $redirect->with("errormessage", $e->getMessage());
        }

        return $redirect;
    }

    public function edit($id)
    {
        $this->authorize(authz(101));
        try {
            $group = $this->usergroup->findOrFail($id);
            $groupPermissions = json_decode($group->combinedGroup->permissions);
            $allPermissions = $this->menu->getMain();
        }
        catch (Exception $e) {
            return redirect()->action('Administrator\GroupController@index')->with("errormessage", $e->getMessage());
        }
        return view('administrator/group/edit', compact("group", "allPermissions", "groupPermissions"));
    }

    public function update(Request $request, $id)
    {
        $redirect = redirect()->action('Administrator\GroupController@index');
        try {
            DB::beginTransaction();
            $data = $request->except("_token", "_method");
            $data["lvl_user"] = "Y";

            UserGroupService::update($id, $data);

            DB::commit();

            $redirect->with("successmessage", "Grup Pengguna berhasil disimpan!");
        }
        catch (Exception $e) {
            DB::rollBack();
            return $redirect->with("errormessage", $e->getMessage());
        }

        return $redirect;
    }
}
