@extends('layouts.app', ['page' => 'permissions', 'pageSlug' => 'permissions', 'section' => 'permissions'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">permissions</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Add permission</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="col-md-10 mx-auto" >
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th>Name</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ strtoupper($permission->name) }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('permissions.show', [$permission->id]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                        <a href="{{ route('permissions.edit', [$permission->id]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit permission">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('permissions.destroy', [$permission->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete permission" onclick="confirm('Are You Sure You Want to Delete?') ? this.parentElement.submit() : ''">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $permissions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
