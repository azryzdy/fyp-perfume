

<div class="card mb-5 py-3">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">\
                <label for="">Collection {{ $group->name }}</label>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($category as $cate_item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('uploads/categoryimage/'.$cate_item->image) }}" class="w-100" alt="">
                        <div class="card-body bg-light">
                            <a href="" class="text-center">
                                <h6 class="mb-0">{{ $cate_item->name }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>