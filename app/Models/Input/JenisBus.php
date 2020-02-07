<?php

namespace App\Models\Input;

use Illuminate\Database\Eloquent\Model;

class JenisBus extends Model
{


    protected $table = "jenis_bus";

    protected $primaryKey = "id";

    public $timestamps = false;

    //field yang diblacklist utk update, harus diset untuk mass assign, $this->fill(), salah satu aja antara ini dengan fillable
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];
}

