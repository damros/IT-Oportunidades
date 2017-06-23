<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    protected $table = "category_groups";

    protected $fillable = ['name'];
	
    public function categorys()
    {
        return $this->hasMany('ITOportunidades\Category', 'category_group_id');
    }

}
