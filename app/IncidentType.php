<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{

	protected $guarded = [];
	
	public $table = "Incident_type";

	public function incidents(){
			
			return $this->hasMany(Incidents::class);
	}

}
