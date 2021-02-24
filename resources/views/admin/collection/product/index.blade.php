@extends('layouts.master')

@section('title')
    Products - List | Perfume
@endsection




@section('content')
<div class="container fluid-mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            @if(session('status'))
                <h6> {{ session('status') }}</h6>
            @endif
                    <h6 class="mb-0">
                    Collection/Products
                    
                    <a href="{{ url('products-delete-records') }}" class="btn bg-primary p-2 text-white float-right">Deleted Records</a>
                    <a href="{{ url('add-products') }}" class="btn bg-primary p-2 text-white float-right">ADD Product</a>
                    </h6>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Original Price</th>
                            <th>Image</th>
                            <th>Small Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @foreach($products as $item)
                             <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>RM{{ $item->original_price }}</td>
                                <td><img src="{{ asset('uploads/products/'.$item->image) }}" alt="Product Image" width="100px"></td>
                                <td>
                                   {{ $item->small_description}}
                                </td>
                                <td>
                                    <a href="{{ url('edit-products/'.$item->id) }}" class="badge btn-danger">Edit</a>
                                    <a href="{{ url('delete-products/'.$item->id) }}" class="badge btn-danger">Delete</a>
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


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
@endsection