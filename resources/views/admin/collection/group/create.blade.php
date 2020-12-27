@extends('layouts.master')

@section('title')
    Group - List | Perfume
@endsection




@section('content')
<div class="container-fluid-mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h6>Collection/Groups 
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('group-store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <div class="form-group">
                                    <input type="text" name="name1" class="form-control" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Custom URL (Slug)</label>
                                <div class="form-group">
                                    <input type="text" name="url" class="form-control" placeholder="Enter URL">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <div class="form-group">
                                    <textarea type="text" name="descrip" class="form-control" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Show / Hide</label>
                                <div class="form-group">
                                    <input type="checkbox" name="status" placeholder="Enter description">
                                </div>
                            </div>
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection