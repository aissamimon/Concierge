@extends('layouts.master')

@section('content')
	<div class="col-md-12 mt-4">

  	<!-- Table to show incidents -->
    <div class="card">
			<div class="card-header">
				<h3 class="card-title cardTitle">Incidents Managment</h3>
				<div class="card-tools">
			    <btn-show-modal><template slot="label">{{ 'Add new' }}</template></btn-show-modal>
				</div>
			</div>
			<div class="card-body table-responsive p-0">
				<confirm-dialog-incidents inline-template>
				<table class="table table-hover incidents-managment">
					<tbody>
						<tr>
							<th>Incident Type</th>
							<th>Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>

						@foreach ($incidents as $incident)
						<tr>
							<td>{{$incident->incidentType->name}}</td>
							<td>{{$incident->name}}</td>
							<td>{{$incident->description}}</td>
							<td>
								<form>
									<button type="button" style="border:none; background: none" 
													v-on:click="onDelete({{ $incident->id }})">
										<i class="fa fa-user-times text-red" style="color:red;"></i>
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</confirm-dialog-incidents>
			</div>
    </div>
	</div>

	<!-- Modal -->
	<modal>
	    <template slot="header">{{ 'New Incident' }}</template>
	    <template slot="body">
	        <incident-form inline-template>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <input v-model="form.name" type="text" name="name" class="form-control"
	                                :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name" required>
	                        <has-error :form="form" field="name"></has-error>
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <input v-model="form.description" type="text" name="description" class="form-control"
	                                :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Giv a description" required>
	                        <has-error :form="form" field="description"></has-error>
	                    </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <select id="incident_type_id" name="incident_type_id" class="form-control" v-model="form.incident_type_id"
	                                :class="{ 'is-invalid': form.errors.has('incident_type_id') }" required>
	                            <option value="">Select Incident...</option>
	                            @foreach ($incident_types as $incident_type)
	                                <option value="{{$incident_type->id}}">{{$incident_type->name}}</option>
	                            @endforeach
	                        </select>
	                        <has-error :form="form" field="incident_type_id"></has-error>
	                    </div>
	                </div>
	            </div>
	        </incident-form>
	    </template>
	</modal>

@endsection
