<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidents;

class NCSupervisorController extends Controller
{
    //
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	 $incidents = Incidents::all();
    	return view('notificationCenterSupervisor', compact('incidents'));
    }
}
