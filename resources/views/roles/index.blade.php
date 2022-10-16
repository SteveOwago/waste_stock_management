@extends('layouts.app', ['page' => 'roles', 'pageSlug' => 'roles', 'section' => 'roles'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Roles</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Add Role</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th>Name</th>
                            <th>Permissions</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ strtoupper($role->name) }}</td>
                                    <td>@forelse($role->permissions as $permission)
                                        <span class="bg-info">{{strtoupper($permission->name)}}</span>&nbsp;
                                        @empty
                                            <span>No Permissions</span>
                                        @endforelse
                                    </td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('roles.show', [$role->id]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
{{--                                        No Editing Super Admin--}}
                                        @if($role->id != 1)
                                        <a href="{{ route('roles.edit', [$role->id]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit role">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                            <form action="{{ route('roles.destroy', [$role->id]) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete role" onclick="confirm('Are you Sure you want to Delete?') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
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
        </div>
    </div>
@endsection
