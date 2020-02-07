<?php

namespace App\Http\Controllers\Kedai;

use App\KopiHelper\Common;
use App\KopiHelper\Registry;
use App\Exceptions\FileNotFoundException;
use App\Models\Files;
use App\Models\Input\Kedai;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TentangController extends Controller
{
    protected $kedai;

    public function __construct()
    {
        $this->kedai = new Kedai();
        $this->files = new Files();
        parent::__construct();
    }

    public function index()
    {
        return view('input/kedai/create');
    }

    public function datatableData()
    {
        $v = Kedai::with('filesCount')->get();
        $v->first()->filesCount;

        return Datatables::of($v)->make();
    }


    public function create()
    {
        return view('input/kedai/create');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->post();//post

            unset($data["_token"], $data["_method"]);

            foreach ($data as $k => $v){
                $this->kedai->$k = $v;
            }

            $this->kedai->save();

            $id = $this->kedai->id;

            for ($i=1; $i<6; $i++) {
                if ($request->hasFile('file'.$i)) {
                    $foto = $request->file("file".$i);
                    $this->files->uploadFile($foto, $i, Registry::TABLE_KEDAI, $id, Registry::UPLOAD_FOLDER_GEDUNG);
                }
            }
        }
        catch (Exception $e) {
            return redirect()->action('Input\KedaiController@index')->with("errormessage", $e->getMessage());
        }

        return redirect()->action('Input\KedaiController@index');
    }

    public function edit($id)
    {
        try {
            $kedai = $this->kedai->findOrFail($id);

            // retrieve from files
            $files = $this->files
                ->where('srcid', '=', $id)
                ->where('srctable', '=', Registry::TABLE_KEDAI)
                ->orderBy('fileid', 'asc')
                ->get();

            $listFile = [];

            foreach ($files as $file) {
                $filename = str_replace('public', 'storage', Registry::UPLOAD_FOLDER_GEDUNG). $file->nama;
                //dd((url($filename)));
                if(is_file(public_path($filename)))
                    $listFile[$file->fileid] = url($filename);

            }

            $kedai->filename = $listFile;

        }
        catch (Exception $e) {
            return redirect()->action('Input\KedaiController@index')->with("errormessage", $e->getMessage());
        }

        return view('input/kedai/edit')->with("kedai", $kedai);
    }


    public function update(Request $request, $id)
    {
        try {
            $kedai = $this->kedai->findOrFail($id);
            $data = $request->except("_token", "_method");

            for ($i=1; $i<6; $i++) {
                if ($request->hasFile('file'.$i)) {
                    // hapus file lama, baru persiapan upload file baru
                    $oldfile = $this->files->where('fileid', '=', $i)
                        ->where('srcid', '=', $id)
                        ->where('srctable', '=', Registry::TABLE_KEDAI)
                        ->first();

                    if($oldfile) {
                        $filexists = Registry::UPLOAD_FOLDER_GEDUNG. $oldfile->nama;
                        if(Storage::exists($filexists)) {
                            Storage::delete($filexists);
                        }

                        $this->files->where('fileid', '=', $i)
                            ->where('srcid', '=', $id)
                            ->where('srctable', '=', Registry::TABLE_KEDAI)
                            ->delete();
                    }


                    $foto = $request->file("file".$i);
                    $result = $this->files->uploadFile($foto, $i, Registry::TABLE_KEDAI, $id, Registry::UPLOAD_FOLDER_GEDUNG);
                    unset($data["file".$i]);
                }
            }

            $kedai->fill($data);
            $kedai->save();

            Cache::forget('sidebar-' . Auth::user()["user_pickname"]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('errormessage', $e->getMessage());
        }

        return redirect()->action('Input\KedaiController@index');
    }

    public function destroy($id)
    {
        try {
            $kedai = $this->kedai->findOrFail($id);
            for ($i=1; $i<6; $i++) {
                // hapus file lama, baru persiapan upload file baru
                $oldfile = $this->files->where('fileid', '=', $i)
                    ->where('srcid', '=', $id)
                    ->where('srctable', '=', Registry::TABLE_KEDAI)
                    ->first();

                if ($oldfile) {
                    $filexists = Registry::UPLOAD_FOLDER_GEDUNG. $oldfile->nama;
                    if(Storage::exists($filexists)) {
                        Storage::delete($filexists);
                    }

                    $this->files->where('fileid', '=', $i)
                        ->where('srcid', '=', $id)
                        ->where('srctable', '=', Registry::TABLE_KEDAI)
                        ->delete();
                }
            }
            $kedai->delete();
        }
        catch (Exception $e) {
            return redirect()->action('Input\KedaiController@index')->with("errormessage", $e->getMessage());
        }

        return redirect()->action('Input\KedaiController@index');
    }

    public function getFiles($id){
        // Fetch all records
        $files['data'] = Kedai::getFiles($id);

        $i = 0;
        foreach ($files['data'] as $file) {
            $filename = str_replace('public', 'storage', Registry::UPLOAD_FOLDER_GEDUNG). $file->nama;
            if(is_file(public_path($filename)))
                $files['data'][$i]->filename = url($filename);

            $i++;
        }

        echo json_encode($files['data']);
        exit;
    }
}
