@extends('layouts.master')

@section('content')
	<div class="col-md-12 mt-4">
		<div class="card collapsed-card">
	    <div class="card-header">
	      <h3 class="card-title cardTitle">Incidents Type</h3>
	      <div class="card-tools">
	        <button type="button" class="btn btn-tool" data-widget="collapse">
	          <i class="fas fa-plus"></i>
	        </button>
	        <button type="button" class="btn btn-tool" data-widget="remove">
	          <i class="fas fa-times"></i>
	        </button>
	      </div>
	    </div><!-- /.card-header -->

	    <div class="card-body p-0" style="display: none;">
	      <div class="d-md-flex">
	      	<div style="display: flex; flex-flow: column; width: 100%">
	      		<div>
	      			<p style="margin: 0 !important; padding: 1rem 1.5rem ">Aqui viene la descripcion</p>
	      		</div>
	        	<div>
	        		<table class="table table-hover" style="margin-bottom: 0 !important">
								<tbody>
									<tr>

										@foreach ($incident_types as $i => $incident_type)
										<th class="typ_incident_table_th">
											<form method="POST" action="incident_type/{{ $incident_type->id }}" class="typ_incident_table">
											@method('PUT')
											@csrf
												<div class="form-group">
													<input 	type="text"
																	name="name"
																	value="{{$incident_type->name}}"
																	onclick="this.style='background-color: transparent ;' " >
												</div>
												<button type="submit" id="buttonSave.{{$i}}"  class="save"><i class="fa fa-save"></i></button>
											</form>
										</th>
										@endforeach

									</tr>

									@if ($errors->any())
									<tr class="column_typIncidentTable_error">
										<th>
											<div>
												<ul>

													@foreach( $errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach

												</ul>
											</div>
										</th>
									</tr>
									@endif

								</tbody>
							</table>
	        	</div>
    			</div>
    		</div><!-- /.d-md-flex -->
  		</div>
  	</div><!-- /.card-body -->

  	<!-- Table to show the incidents -->
    <div class="card">
			<div class="card-header">
				<h3 class="card-title cardTitle">Incidents Managment</h3>
				<div class="card-tools">
			    <button class="btn btn-success" data-toggle="modal" data-target="#AddnewModal">Add New
			        <i class="fas fa-user-plus fa-fw"></i>
			    </button>
				</div>
			</div>
			<div class="card-body table-responsive p-0">
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
								<form method="POST" action="/incident/{{ $incident->id }}">
									@method('DELETE')
	  								@csrf
									<button type="submit" style="border:none; background: none">
										<i class="fa fa-user-times text-red" style="color:red;"></i>
									</button>
								</form>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
    </div>
	</div>

 	<!-- Modal -->
  <imodal inline-template>
		<div class="modal fade" id="AddnewModal" tabindex="-1" role="dialog" aria-labelledby="AddnewModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="AddnewModalLabel">Add New Incident</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form  method="POST" action="/incident" @submit.prevent="onSubmit">

						<div class="modal-body">
							<div class="form-group">
								<input 	type="text"
												id="name"
												name="name"
												placeholder="Insert incident Name"
												class="form-control"
												value="{{old('name')}}"
												v-model="name" >

								<span class="addIncidentTypeErrorMessage"
											v-text="errors.get('name')">
								</span>
							</div>

							<div class="form-group">
								<input 	type="text"
												id="description"
												name="description"
												placeholder="Insert a description for the incident"
												class="form-control "
												value="{{old('description')}}"
												v-model="description" >

								<span class="addIncidentTypeErrorMessage"
											v-text="errors.get('description')">
								</span>
							</div>

							<div class="form-group" style="display: flex; flex-direction: column;">
								<select  	id="incidentTypeId"
													name="incident_type_id"
													class="form-control"
													v-model="incident_type_id" >

									<option value=""></option>
									@foreach ($incident_types as $incident_type)
									  <option value="{{$incident_type->id}}">{{$incident_type->name}}</option>
									@endforeach
								</select>

									<span class="addIncidentTypeErrorMessage"
												v-text="errors.get('incident_type_id')">
									</span>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" >Save changes</button>
						</div>
					</form>
		    </div>
		  </div>
		</div>
  </imodal>

@endsection
