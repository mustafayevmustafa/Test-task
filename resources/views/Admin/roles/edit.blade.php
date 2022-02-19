@extends('Admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a class="btn btn-outline-primary mt-4" href="{{route('roles.index')}}"><i
                                    class="mdi mdi-arrow-left"></i></a>
                        @if (is_null($action))
                            <a style="height:46px;margin-top:10px;" class="btn btn-outline-primary"
                               href="{{route('roles.edit', $data)}}">Edit</a>
                        @endif
                    </div>
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf @method($method)

                        <div class="form-group">
                            <label for="post-title">Role Name</label>
                            <input type="text" value="{{ optional($data)->getAttribute('name') }}" name="name"
                                   class="form-control" id="product-name" placeholder="Role name insert">
                            @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="post-title">Permission Select</label>
                            <select class="permission w-100" name="permissions[]" multiple="multiple"
                                    class="custom-select">
                                @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}" @if($data->permissions->contains('id', $permission->id)) selected @endif>{{$permission->getAttribute('name')}}</option>
                                @endforeach
                            </select>
                        </div>
                    @if ($action)
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                    @endif
                    </form>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.permission').select2();
        });
    </script>
@endsection

