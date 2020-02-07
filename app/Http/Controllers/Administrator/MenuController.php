<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    protected $menu;

    public function __construct()
    {
        $this->menu = new Menu();
        parent::__construct();
    }

    public function index()
    {
        $this->authorize("index", Menu::class);
        return view('administrator/menu/index');
    }

    public function datatableData($level)
    {
        if($level == "0")
            $v = $this->menu->where("id_menu_induk","0")->get();
        elseif ($level == "1")
            $v = $this->menu->where("id_menu_induk",">","0")->where("id_menu_anak","0")->get();
        elseif ($level == "2")
            $v = $this->menu->where("id_menu_anak",">","0")->get();

        foreach ($v as $row){
            $row->menuinduk = $this->menu->find($row->id_menu_induk);
        }

        return Datatables::of($v)->make();
    }

    public function create()
    {
        $rowMenu = $this->menu->getMain();
        return view('administrator/menu/create')->with("rowMenu", $rowMenu);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->post();//post

            unset($data["_token"], $data["_method"]);

            foreach ($data as $k => $v){
                $this->menu->$k = $v;
            }

            $this->menu->save();
        }
        catch (Exception $e) {
            return redirect()->action('Administrator\MenuController@index')->with("errormessage", $e->getMessage());
        }

        return redirect()->action('Administrator\MenuController@index');
    }

    public function edit($id)
    {
        try {
            $menu = $this->menu->findOrFail($id);
            $rowMenu = $this->menu->getMain();
        }
        catch (Exception $e) {
            return redirect()->action('Administraator\MenuController@index')->with("errormessage", $e->getMessage());
        }

        return view('administrator/menu/edit')->with("menu", $menu)->with("rowMenu", $rowMenu);
    }


    public function update(Request $request, $id)
    {
        try {
            $menu = $this->menu->findOrFail($id);
            $data = $request->post();//post

            unset($data["_token"], $data["_method"]);

            foreach ($data as $k => $v){
                $menu->$k = $v;
            }

            $menu->save();

            Cache::forget('sidebar-' . Auth::user()["user_pickname"]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('errormessage', $e->getMessage());
        }

        return redirect()->action('Administrator\MenuController@index');
    }
}
