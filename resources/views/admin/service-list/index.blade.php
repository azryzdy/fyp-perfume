@extends('layouts.master')

@section('title')
    Product - List | Perfume
@endsection




@section('content')
<!-- ADD Modal -->
<div class="modal fade" id="servicelistaddAP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Amount Product to a Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/servicelist-listadd') }}" method="post">
        {{ csrf_field() }}
     
        <div class="modal-body">
            <div class="form-group">
                <label>Product Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter Price">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Amount&Price</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END ADD Modal -->

<!-- Modal -->
<div class="modal fade" id="servicelistmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Product to a Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/servicelist-add') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="">Category Name</label>
                <select name="serv_cate_id" class="form-control" required>
                    @foreach($service_category as $cate_item)
                    <option value="{{ $cate_item->id }}">{{ $cate_item->service_name }}</option>
                    @endforeach
               
                </select>
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="title" class="form-control" placeholder="Enter TItle">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Product Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
                 
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter Price">
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END Modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product - List
                        <a href="" class="btn btn-primary float-right py-2" data-toggle="modal" data-target="#servicelistmodal">ADD</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>EDIT</th>
                                <th>ADD</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service_list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->service_category->service_name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ url('/service-list-edit/'.$item->id) }}" class="btn btn-info">EDIT</a>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#servicelistaddAP   " class="btn btn-success">ADD</a>
                                </td>
                                <td>
                                    <form action="/service-list-delete/{{ $item->id }}" method="post">
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