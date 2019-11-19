<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidents extends Model
{

	protected $guarded = [];
	
  public function incidentType(){
  	
		return $this->belongsTo(IncidentType::class);
	}
}
