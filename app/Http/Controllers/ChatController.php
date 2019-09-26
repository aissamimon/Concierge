<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Incidents;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        //
    }

    public function chatUI()
    {
    	$users = User::all();
    	return view('chatUI', compact('users'));
    }

    public function chatClient()
    {
        $users = User::all();
        $incidents = Incidents::all();
        return view('chatClientUI', compact('users', 'incidents'));
    }
}
