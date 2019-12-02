<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidents;
use App\Notification;

class NCSupervisorController extends Controller
{
    //
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$incidents = Incidents::all();
    	$notifications = Notification::orderBy('created_at', 'desc')->get();
    	return view('notificationCenterSupervisor', compact('incidents', 'notifications'));
    }

    public function store()
    {

    }


    protected function validator(Request $request)
    {
        $attributes = $request->validate([]);
        return $attributes;
    }


}
