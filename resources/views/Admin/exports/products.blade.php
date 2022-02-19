<table>
    <thead>
    <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Count</th>
        <th scope="col">Seller Price</th>
        <th scope="col">Cost</th>
        <th scope="col">Gain</th>
        <th scope="col">Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->count }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->cost }}</td>
            <td>{{ $product->productGain }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>