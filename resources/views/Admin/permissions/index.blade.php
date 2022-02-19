@extends('Admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 mt-4">
                        <a class="btn btn-outline-success" href="{{route('permissions.create')}}">Permission Add</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Permission Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->getAttribute('name') }}</td>
                                <td>{{ $permission->getAttribute('created_at') }}</td>
                                <td>
                                    <a href="{{ route('permissions.show', $permission) }}" class="btn"><i class="mdi mdi-18px mdi-eye" style="color: blue"></i></a>
                                    <a href="{{ route('permissions.edit', $permission) }}" class="btn"><i class="mdi mdi-18px mdi-pencil-circle" style="color: blue"></i></a>
                                    <form style="display:inline-block" method="post" action="{{route('permissions.destroy',$permission->id)}}">
                                        @method('delete') @csrf
                                        <button type="submit" class="btn m-3">
                                            <i style="color:red" class="mdi mdi-18px mdi-close-circle" ></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $permissions->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
