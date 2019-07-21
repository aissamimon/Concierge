<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\IncidentType;
use App\Incidents;



class IncidentTypeController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incident_type  $incident_type
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentType $incident_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incident_type  $incident_type
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentType $incident_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incident_type  $incident_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $incident_type = IncidentType::find($id);

        $this->validate($request, [
            'name' => 'required|min:3|max:25|unique:incident_type,name'
        ]);

        $incident_type->name = $request->input('name');
        $incident_type->save();

        toast('Correctly Updated','success');
        return redirect('/incident_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incident_type  $incident_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident_type $incident_type)
    {
        //
    }

}
