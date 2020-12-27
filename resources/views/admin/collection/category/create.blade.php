@extends('layouts.master')

@section('title')
    Create Category Form | Perfume
@endsection




@section('content')
<div class="container-fluid-mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h6>Collection/Category Form
                <a href="{{ url('category') }}"  class="btn bg-primary p-2 text-white float-right">BACK</a>
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
                    <form action="{{ url('category-store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                <label for="">Group ID (Name)</label>
                                    <select name="group_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($group as $gitem)
                                            <option value="{{ $gitem->id }}">{{ $gitem->name1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Custom URL (Slug)</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enter URL">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <div class="form-group">
                                    <textarea rows="4" name="description" class="form-control" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                    <label >Press here for Image</label>
                                    <input type="file" name="category_img" class="form-control">
                           
                            </div>
                            <div class="col-md-6">
                             
                                    <label for="">Press here for Icon</label>
                                    <input type="file" name="category_icon" class="form-control">
                               
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Show / Hide</label>
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