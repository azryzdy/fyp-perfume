@extends('layouts.master')

@section('title')
    Group - List | Perfume
@endsection




@section('content')
<div class="card mb-4-wow fadeIn">
    <div class="">
        <h6 class="mb-2 mb-sm-0 pt-1">
            <a href="">Collection</a>
            <a href="{{ url('group') }}"  class="btn bg-primary p-2 text-white float-right">BACK</a>
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
                                <a href="{{ url('group-re-store/'.$item->id) }}" class="badge py-2 btn-danger">Re-Store</a>
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