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
                <a href="{{ url('group') }}" class="badge bg-danger p-2 text-white float-right">BACK</a></h6>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ url('group-update/'.$group->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <div class="form-group">
                                    <input type="text" name="name1" class="form-control" placeholder="Enter name" value="{{ $group->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Custom URL (Slug)</label>
                                <div class="form-group">
                                    <input type="text" name="url"  value="{{ $group->url }}" class="form-control" placeholder="Enter URL">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <div class="form-group">
                                    <textarea type="text" name="descrip" class="form-control" placeholder="Enter description">{{ $group->descrip }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Show / Hide</label>
                                <div class="form-group">
                                    <input type="checkbox" name="status" {{ $group->status == '1' ? 'checked' : '' }} placeholder="Enter description">
                                </div>
                            </div>
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Save</button>
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