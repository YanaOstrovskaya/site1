<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function roles(){
        return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }
            //проверяем наличие роли $check='admin'
        public function hasRole($check){
        $roles = array_pluck($this->roles->toArray(), 'name'); //одномерный массив с названиями ролей текущего пользователя
        return in_array($check, $roles);
    }
}
