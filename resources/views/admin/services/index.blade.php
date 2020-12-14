@extends('layouts.master')

@section('title')
    Category | Perfume
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category
                        <a href="{{ url('service-create') }}" class="btn btn-primary float-right py-2">ADD</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                            <tr>
                                <input type="hidden" class="serdelete_val_id" value="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->service_description }}</td>
                                <td>
                                    <a href="{{ url('service-cate-edit/'.$item->id) }}" class="btn btn-info">EDIT</a>
                                </td>
                                <td>
                                <form action="/category_delete/{{ $item->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger ">DELETE</button>             
                                </form>
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


@section('scripts')
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable();
        });
    </script>
@endsection