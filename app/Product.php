<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Translit;
class Product extends Model
{
    public function category(){
    	//по умолчанию определяет внешний ключ по названию метод_id
    	return $this->belongsTo('App\Category');
    }
    public function manufacture(){
    	//по умолчанию определяет внешний ключ по названию метод_id
    	return $this->belongsTo('App\Manufacture');
    }
    /*
    Выводить цену редактируемую с грн к примеру
	getазвание_столбца_таблицыAttribute
метод  читатель
	    public function getPriceAttribute($value)
    {
    	return $value.' UAH';
    }
    */
/*
метод писатель
	public function setPriceAttribute($value)
	{
		$this->attributes['price'] = $value+1000;
	}
	*/
	public function setMetaTitleAttribute($value)
	{
		$this->attributes['meta_title'] = $value==''?$this->attributes['name']:$value;
	}

	public function setSlugAttribute($value)
	{//форматировать для url строки
		$this->attributes['slug'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
	}
}
