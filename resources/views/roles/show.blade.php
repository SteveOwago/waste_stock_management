@extends('layouts.app', ['page' => 'Role Information', 'pageSlug' => 'roles', 'section' => 'roles'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Role: {{strtoupper($role->name)}}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>

                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
