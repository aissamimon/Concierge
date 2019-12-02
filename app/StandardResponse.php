<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardResponse extends Model
{

  protected $guarded = [];

	public function notifications(){
		return $this->hasMany(Notification::class);
	}
}
