<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $table = 'users';

  protected $fillable = [
    'id', 'name', 'email', 'phone', 'password', 'avatar', 'active', 'remember_token',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'role_user');
  }
}
