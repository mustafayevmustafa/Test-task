@extends('Admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 mt-4">
                        @can('create', \App\Models\Product::class)
                            <a class="btn btn-outline-success" href="{{route('products.create')}}">Product Add</a>
                        @endcan
                        <a class="btn btn-outline-primary float-right mr-sm-2" href="{{route('products.export')}}">Export</a>
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
                            <th scope="col">Product Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">Seller Price</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Gain</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->getAttribute('name') }}</td>
                                <td>{{ $product->getAttribute('count') }}</td>
                                <td>{{ $product->getAttribute('price') }}</td>
                                <td>{{ $product->getAttribute('cost') }}</td>
                                <td>{{$product->productGain}}</td>
                                <td>{{ $product->getAttribute('created_at') }}</td>
                                <td>
                                    @can('view', $product)
                                        <a href="{{ route('products.show', $product) }}" class="btn"><i class="mdi mdi-18px mdi-eye" style="color: blue"></i></a>
                                    @endcan
                                    @can('update', $product)
                                        <a href="{{ route('products.edit', $product) }}" class="btn"><i class="mdi mdi-18px mdi-pencil-circle" style="color: blue"></i></a>
                                    @endcan
                                    <form style="display:inline-block" method="post" action="{{route('products.destroy',$product->id)}}">
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
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
