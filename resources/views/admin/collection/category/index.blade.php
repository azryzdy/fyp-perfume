@extends('layouts.master')

@section('title')
    Category - List | Perfume
@endsection




@section('content')
<div class="container fluid-mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <h6> {{ session('status') }}</h6>
            @endif
            <div class="card">
                    <h6 class="mb-0">
                    Collection/Category
                    
                    <a href="{{ url('category-delete') }}" class="btn bg-primary p-2 text-white float-right">Deleted Category</a>
                    <a href="{{ url('category-add') }}" class="btn bg-primary p-2 text-white float-right">ADD Category</a>
                    </h6>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->group->name1 }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ asset('uploads/categoryimage/'.$item->image) }}" width="100px" />
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/categoryicon/'.$item->icon) }}" width="100px" />
                                </td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="{{ url('category-edit/'.$item->id) }}" class="badge btn-primary">Edit</a>
                                    <a href="{{ url('category-delete/'.$item->id) }}" class="badge btn-danger">Delete</a>
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