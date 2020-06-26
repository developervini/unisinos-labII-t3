<?php

use \Illuminate\Database\Eloquent\Model as Model;
use \Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Pet extends Model
{
	use SoftDeletes;

	protected $table = "pet";
    protected $fillable = ['name', 'type', 'sex', 'size', 'img','breedId', 'orgId'];
    
    public function breed()
	{
		return $this->belongsTo('Breed', 'breedId');
    }
    
    public function org()
	{
		return $this->belongsTo('Org', 'orgId');
	}
}
