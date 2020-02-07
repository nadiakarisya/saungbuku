<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu';

    /**
     *
     *
     * @var boolean
     */
    public $incrementing = false;
    
    /**
     *
     *
     * @var boolean
     */
    public $timestamps = false;

    //
    protected static function boot()
    {
    	parent::boot();

    	static::addGlobalScope('order', function(Builder $builder) {
            $builder->select('id', 'nama', 'id_menu_induk', 'id_menu_anak', 'uri', 'class', 'urutan');
    		$builder->orderByRaw('urutan ASC');
    	});
    }

    //
    public function getMain()
    {
    	return $this
            ->where('id_menu_induk', '0')
    		->where('aktif', 'Y')
    		->orderBy('id')
    		->get();
    }

    public function scopeIsMain($query, $item)
    {
    	return $query
            ->where('id_menu_induk', 0)
    		->where('aktif', 'Y')
    		->whereIn('id', $item);
    }

    //
    public function scopeIsSub($query, $item, $id)
    {
    	return $query
            ->where('id_menu_induk', $id)
            ->where('id_menu_anak', 0)
    		->where('aktif', 'Y')
    		->whereIn('id', $item);
    }

    //
    public function scopeIsSubChild($query, $item, $id)
    {
    	return $query
            ->where('id_menu_anak', $id)
    		->where('aktif', 'Y')
    		->whereIn('id', $item);
    }

}
