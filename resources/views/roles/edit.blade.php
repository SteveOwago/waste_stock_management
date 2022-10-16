@extends('layouts.app', ['page' => 'Register role', 'pageSlug' => 'roles', 'section' => 'roles'])
@section('styles')
    {{-- selec2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Role: {{$role->name}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('roles.update',[$role->id]) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">Role Information</h6>
                            <div class="col-md-8 mx-auto">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="input-name">Role Name</label>
                                    <input type="text" name="name" class="form-control" value="{{strtoupper($role->name)}}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('permissions') ? ' has-danger' : '' }}">
                                    <label for="input-name">Permissions</label>
                                    <select name="permissions[]" id="input-category-multiple" multiple="multiple" class="form-select select2-multiple form-control{{ $errors->has('permision_id') ? ' is-invalid' : '' }}" required>
                                        @foreach ($permissions as $permission)
                                            @if($permission->id == old('permissions'))
                                                <option value="{{$permission->id}}" selected>{{$permission->name}}</option>
                                            @else
                                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'permissions'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });

    </script>
@endsection



