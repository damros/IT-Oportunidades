<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorys";
	protected $appends = ['full_name'];

    protected $fillable = ['name','category_group_id'];
    
	public function group() {
        return $this->belongsTo('ITOportunidades\CategoryGroup', 'category_group_id');
    }
	
	public function fullName() {
		//return ($this->group ? $this->group->name : '').' '.$this->attributes["name"];
		//$this->attributes['fullName'] = ($this->group ? $this->group->name : '').' '.$this->attributes["name"];
	}
	
    public function getFullNameAttribute()
    {
        return ($this->group ? $this->group->name.' ' : '').$this->attributes["name"];
    }	
}
