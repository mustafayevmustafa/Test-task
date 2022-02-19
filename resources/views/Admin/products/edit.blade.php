@extends('Admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a class="btn btn-outline-primary mt-4" href="{{route('products.index')}}"><i class="mdi mdi-arrow-left"></i></a>
                        @if (is_null($action))
                            <a style="height:46px;margin-top:10px;" class="btn btn-outline-primary" href="{{route('products.edit', $data)}}">Edit</a>
                        @endif
                    </div>
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf @method($method)

                        <div class="form-group">
                            <label for="post-title">Product Name</label>
                            <input type="text" value="{{ optional($data)->getAttribute('name') }}" name="name" class="form-control" id="product-name" placeholder="Product name insert">
                            @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="product-count">Product Count</label>
                            <input type="number" value="{{ optional($data)->getAttribute('count') }}" name="count" class="form-control" id="product-count" placeholder="Product count insert">
                            @error('count')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="product-price">Product Price</label>
                            <input type="number" value="{{ optional($data)->getAttribute('price') }}" name="price" class="form-control" id="product-price" placeholder="Product price insert">
                            @error('price')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="product-count">Product Cost</label>
                            <input type="number" value="{{ optional($data)->getAttribute('cost') }}" name="cost" class="form-control" id="product-cost" placeholder="Product cost insert">
                            @error('cost')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
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
