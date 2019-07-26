@extends('layouts.master')

@section('content')
<div class="col-md-12 mt-4">
    <!-- Table to show roles -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title cardTitle">Staffs Managment</h3>
            <div class="card-tools">
                <btn-show-modal><template slot="label">{{ 'Add new' }}</template></btn-show-modal>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover incidents-managment">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->username}}</td>
                        <td>{{$staff->roles->first()->name}}</td>
                        <td>
                            @if (auth()->user()->id != $staff->id)
                            <form method="POST" action="/staffs/{{ $staff->id }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" style="border:none; background: none">
                                    <i class="fa fa-user-times text-red" style="color:red;"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<modal>
    <template slot="header">{{ 'New Staff' }}</template>
    <template slot="body">
        <staff-form inline-template>
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
                        <input v-model="form.username" type="text" name="username" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('username') }" placeholder="Username" required>
                        <has-error :form="form" field="username"></has-error>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <select id="role_id" name="role_id" class="form-control" v-model="form.role_id"
                                :class="{ 'is-invalid': form.errors.has('role_id') }" required>
                            <option value="">Select Role...</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <has-error :form="form" field="role_id"></has-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" autocomplete="new-password" required>
                        <has-error :form="form" field="password"></has-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input v-model="form.password_confirmation" type="password" name="password_confirmation" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Confirme Password" autocomplete="new-password" required>
                    </div>
                </div>
            </div>
        </staff-form>
    </template>
</modal>
@endsection
