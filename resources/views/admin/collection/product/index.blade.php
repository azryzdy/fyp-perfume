@extends('layouts.master')

@section('title')
    Category - List | Perfume
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
                    
                    <a href="{{ url('') }}" class="btn bg-primary p-2 text-white float-right">Deleted Records</a>
                    <a href="{{ url('add-products') }}" class="btn bg-primary p-2 text-white float-right">ADD Product</a>
                    </h6>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Sub Category Name</th>
                            <th>Image</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @foreach($products as $item)
                             <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->subcategory->name }}</td>
                                <td><img src="{{ asset('uploads/products/'.$item->image) }}" alt="Product Image" width="100px"></td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : ''}} >
                                </td>
                                <td>
                                    <a href="{{ url('edit-products/'.$item->id) }}" class="badge btn-danger">Edit</a>
                                    <a href=" " class="badge btn-danger">Delete</a>
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