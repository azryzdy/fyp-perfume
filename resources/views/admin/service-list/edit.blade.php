@extends('layouts.master')

@section('title')
    Product - List | Perfume
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Product List
                        <a href="{{ url('/service-list') }}" class="btn btn-primary float-right py-2">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{ url('/servicelist-update/'.$ser_list->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Service category</label>
                            <select name="serv_cate_id" class="form-control" required>
                                <option value="{{ $ser_list->serv_cate_id }}">{{ $ser_list->service_category->service_name }}</option>
                                @foreach($service_category as $cate_item)
                                <option value="{{ $cate_item->id }}">{{ $cate_item->service_name }}</option>
                                @endforeach
                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ServiceList Name</label>
                            <input type="text" name="title" class="form-control" value="{{ $ser_list->title }}" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="">ServiceList Description</label>
                            <textarea name="description"class="form-control" rows="3">{{ $ser_list->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">ServiceList Amount</label>
                            <input type="number" name="amount" value="{{ $ser_list->amount }}" class="form-control" placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                            <label for="">ServiceList Price</label>
                            <input type="text" name="price" value="{{ $ser_list->price }}" class="form-control" placeholder="Enter Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                      
                        <button type="submit" class="btn btn-primary">Update List</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection