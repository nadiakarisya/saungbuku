<?php

namespace App\Models;

use App\KopiHelper\Common;
use Illuminate\Database\Eloquent\Model;
//use CompositeKey;

class Files extends Model
{
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';
    protected $primaryKey = ['fileid', 'srcid', 'srctable'];

    /**
     *
     *
     * @var boolean
     */
    public $incrementing = false;

    protected $fillable = [
        'fileid', 'srctable', 'srcid', 'nama', 'deskripsi'
    ];
    
    /**
     *
     *
     * @var boolean
     */
    public $timestamps = false;

    public function uploadFile($file, $fileid, $srctable, $srcid, $storage)
    {
        $foto = $file;
        $id = $srcid."-".$fileid;

        $filename = str_replace(' ','',$id) .'.'.$foto->getClientOriginalExtension();
        $this->file = Common::uploadFile($foto, $storage, $filename);
        return $this->updateOrCreate(
            ['fileid' => $fileid, 'srctable' => $srctable, 'srcid'=>$srcid],
            ['nama'=>$filename, 'deskripsi'=>'']);
    }

}
