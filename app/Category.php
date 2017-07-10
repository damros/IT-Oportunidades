<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorys";

    protected $fillable = ['name','category_group_id'];
    
	public function group() {
        return $this->belongsTo('ITOportunidades\CategoryGroup', 'category_group_id');
    }
}
