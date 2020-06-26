<?php

use \Illuminate\Database\Eloquent\Model as Model;
use \Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Breed extends Model
{
	use SoftDeletes;

	protected $table = "breed";
	protected $fillable = ['name',  'type'];
}