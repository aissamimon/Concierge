<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Incidents;
use App\IncidentType;



class IncidentsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents =  Incidents::all();
        $incident_types =  IncidentType::all();

        return view('incidents', compact('incident_types', 'incidents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = $this->validator(request());

        try {
            $incident = Incidents::create($attributes);
        } catch (\Exception $e) {
            return back()->withToastError('Whoops, looks like something went wrong!');
        }

        return redirect('/incident');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidents  $incidents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $incident = Incidents::find($id);
            $incident->delete();
        } catch (\Exception $e) {
            return back()->withToastError('Whoops, looks like something went wrong!');
        }

        return redirect('/incident')->withToastSuccess('Successfully deleted!');
    }

    protected function validator(Request $request)
    {

        $messages = [
            'incident_type_id.required' => 'This field is required.'
        ];

        $attributes = $request->validate([
            'name' => 'bail|required|min:5|max:25|string',
            'description' => 'required|string',
            'incident_type_id' => 'required',
        ]);

        return $attributes;
    }

}
