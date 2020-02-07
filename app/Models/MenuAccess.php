<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class MenuAccess extends Model
{

    protected $table = 'menu_akses';

    protected $primaryKey = 'id';

    public $timestamp = false;

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'id_menu');
    }

}
