<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidents;
use App\Notification;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validator(request());
        $notification = Notification::create($attributes);
        return redirect('/NCSupervisor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Notification::findOrFail($id);
        $this->validate($request,[
            'standard_response_id' => 'required',
            'message' => 'required|string|min:8',
            'status' => ''
        ]);

        $user->update(['standard_response_id' => $request->input('standard_response_id'), 'message' => $request->input('message')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserNotifications(Request $request){
        $userid = $request->user_id;
        $notification = Notification::where('user_id', $userid)->first();
        
        return response()->json([
            'data' => $notification
        ]);
    }

    protected function validator(Request $request)
    {

        $attributes = $request->validate([
            'user_id' => 'required',
            'incident_id' => 'required',
            'description' => 'required|string|min:8',

        ]);

        return $attributes;
    }
}
