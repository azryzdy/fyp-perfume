@extends('layouts.master')

@section('title')
    Dashboard | Battle of Munda
@endsection




@section('content')

<!--  START DELETE MODAL  -->

<!-- Modal -->
    <div class="modal fade" id="deletemodalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
<!-- END DELETE MODAL -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                    <!--    Register Table
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    -->
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-stripped">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Email</th>
                                <th>Usertype</th>
                                <th>Edit</th>
                                <th>Type</th>
                            </thead>
                            <tbody>
                            
                            @foreach ($users as $row)
                            <tr>
                                <td> {{ $row->id}} </td>
                                <td> {{ $row->name}} </td>
                                <td> {{ $row->nameDOB}} </td>
                                <td> {{ $row->email}} </td>
                                <td> {{ $row->usertype}}</td>
                                <td><a href="/role-edit/{{ $row->id }}" class="btn btn-success">EDIT</a></td> 
                                <td>
                                <form action="/role-delete/{{ $row->id }}" method="post">
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
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
@endsection
