<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Translit;
class Manufacture extends Model
{
  	public function setSlugAttribute($value)
	{//форматировать для url строки
		$this->attributes['slug'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
	}
}
