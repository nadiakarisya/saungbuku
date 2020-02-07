<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tooltip extends Model
{
    //

    protected $connection = 'pgsql';

    protected $table = 'tooltip';

    protected $primaryKey = 'id';

    public $timestamps = false;

//    protected $fillable = ['id'];
    protected $guarded = [];


    public function showTooltipDetail(string $id){
        return $this->find($id);
    }

    public function findByUrl(string $url){
        return $this
            ->select('*')
            ->where('url','=',$url)
            ->get();
    }

    public function insertTooltip(array $insertData){
        $this->fill($insertData);
        $this->save();
    }

    public function updateTooltip($id, array $updateData){
        $tools = $this->find($id);
        $tools->fill($updateData);
        $tools->save();
    }

    public function deleteTooltip(string $id){
        $tools = $this->find($id);
        $tools->delete();
    }
}
