@extends('layouts.app', ['page' => 'Register permission', 'pageSlug' => 'permissions', 'section' => 'permissions'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Update permission</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('permissions.update',[$permission->id]) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">Permission Information</h6>
                            <div class="col-md-8 mx-auto">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="input-name">Permission Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Permission Name" value="{{$permission->name}}">
                                    @include('alerts.feedback', ['field' => 'name'])
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
@section('js')
    <script>
        $(document).ready(function() {
            $('#input-category-multiple').select2({
                placeholder: 'Select an option',
            });
        });
    </script>
@endsection


