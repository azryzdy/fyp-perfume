@extends('layouts.master')

@section('title')
    Group - List | Perfume
@endsection




@section('content')
<div class="card mb-4-wow fadeIn">
    <div class="">
        <h6 class="mb-2">
            Collection/GROUP
            <a href="{{ url('group-add') }}" class="btn bg-primary p-2 text-white float-right">ADD Category</a>
            <a href="{{ url('group-delete-records') }}" class="btn bg-primary p-2 text-white float-right">DELETED Group</a>
        </h6>
    </div>
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped-table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                         @foreach($group as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name1 }}</td>
                            <td>{{ $item->descrip }}</td>
                            <td>
                                <input type="checkbox" {{ $item->status == '1' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ url('group-edit/'.$item->id) }}" class="badge btn-primary">Edit</a>
                                <a href="{{ url('group-delete/'.$item->id) }}" class="badge btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection