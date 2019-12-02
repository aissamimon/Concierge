<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

	protected $fillable = [
        'user_id', 'incident_id', 'description', 'standard_response_id', 'message',
    ];

	public function users(){
		return $this->belongsTo(User::class);
	}

	public function incidents(){
		return $this->belongsTo('App\Incidents', 'incident_id');
	}

	public function standardResponses(){
		return $this->belongsTo(StandardResponse::class);
	}
}
