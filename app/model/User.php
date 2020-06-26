<?php

use \Illuminate\Database\Eloquent\Model as Model;
use \Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class User extends Model
{
	use SoftDeletes;

	protected $table = "user";
	protected $fillable = ['name', 'username', 'password'];
}
