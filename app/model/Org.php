<?php

use \Illuminate\Database\Eloquent\Model as Model;
use \Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Org extends Model
{
	use SoftDeletes;

	protected $table = "org";
	protected $fillable = ['name', 'address', 'email', 'phone'];
}