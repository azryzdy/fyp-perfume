@extends('layouts.master')

@section('title')
    Edit | Perfume
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Category
                        <a href="{{ url('/service-category') }}" class="btn btn-primary float-right py-2">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{ url('category_update/'.$service_category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Services Cate Name </label>
                            <input type="text" name="service_name" class="form-control" placeholder="{{ $service_category->service_name }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Services Cate Description </label>
                            <textarea type="text" name="service_description" class="form-control">{{ $service_category->service_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info">UPDATE</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
@endsection