<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Translit;
class Category extends Model
{
    	public function setMetaTitleAttribute($value)
	{
		$this->attributes['meta_title'] = $value==''?$this->attributes['name']:$value;
	}

	public function setSlugAttribute($value)
	{//форматировать для url строки
		$this->attributes['slug'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
	}
}
