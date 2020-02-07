<?php

namespace App\Models\Input;

use App\KopiHelper\Registry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kedai extends Model
{


    protected $table = Registry::TABLE_KEDAI;

    protected $primaryKey = "id";

    public $timestamps = true;

    //field yang diblacklist utk update, harus diset untuk mass assign, $this->fill(), salah satu aja antara ini dengan fillable
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public static function getFiles($srcid) {
        $files = DB::table('files')
            ->where('srcid', $srcid)
            ->where('srctable', Registry::TABLE_GEDUNG)
            ->get();

        return $files;
    }

    public function files()
    {
        return $this->hasMany('App\Models\Files', 'srcid');
    }

    public function filesCount()
    {
        return $this->hasOne('App\Models\Files', 'srcid')
            ->selectRaw('srcid, count(*) as aggregate')
            ->where('srctable', Registry::TABLE_GEDUNG)
            ->groupBy('srcid');
    }

    public function getFilesCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if ( ! array_key_exists('filesCount', $this->relations))
            $this->load('filesCount');

        $related = $this->getRelation('filesCount');

        // then return the count directly
        return ($related) ? (int) $related->aggregate : 0;
    }
}

