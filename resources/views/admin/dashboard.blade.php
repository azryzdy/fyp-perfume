@extends('layouts.master')

@section('title')
    Dashboard | Perfume
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Simple Table
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td> 
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    <div class="container">
                        <form action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="ename" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="epost" class="form-control" placeholder="Enter Email ID">
                            </div>
                            <label>Mana file</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <img src="{{ asset('uploads/employee/1607749280.jpg/phpEE19.tmp') }}" alt="what">
        </div>
    </div>
@endsection


@section('scripts')
@endsection
