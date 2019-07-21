<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Incidents;



class IncidentsController extends Controller
{
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

        $rules = [
            'name' => 'bail|required|min:3|max:25',
            'incident_type_id' => 'required',
            'description' => 'required|min:5',
        ];

        $messages = [
            'incident_type_id.required' => 'The Incident type field is required.'
        ];

        $this->validate($request, $rules, $messages);

        Incidents::create([

            'name' => request('name'),
            'description' => request('description'),
            'incident_type_id' => request('incident_type_id')
        ]);

        return redirect('/incident_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidents  $incidents
     * @return \Illuminate\Http\Response
     */
    public function show(Incidents $incidents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidents  $incidents
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidents $incidents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidents  $incidents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidents $incidents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidents  $incidents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidents $incident)
    {
        $incident->delete();

        toast('Correctly Deleted','success');
        return redirect('/incident_type');
    }

}
