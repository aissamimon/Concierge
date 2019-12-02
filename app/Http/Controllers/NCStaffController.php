<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\StandardResponse;

class NCStaffController extends Controller
{
    //
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$users = User::all();
    	$responses = StandardResponse::all();
        $notifications = Notification::orderBy('created_at', 'desc')->get();
    	return view('notificationCenterStaff', compact('users', 'responses', 'notifications'));
    }
    
}
