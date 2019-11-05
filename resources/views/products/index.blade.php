@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel-Lumen 6 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/products/create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ url('/products/destroy/'. $product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ url('/products/show/'. $product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ url('/products/edit/'. $product->id) }}">Edit</a>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
      
@endsection