<div class="row">
    @foreach ($products as $item)
    <div class="col-sm-6 col-xl-3">
        <!-- Simple card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="{{ asset('images/panen/'.$item->cover) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-2">{{ $item->title }}</h4>
                <p class="card-text">{{ $item->description }}</p>
                <div class="text-end">
                    <a href="javascript:;" onclick="load_detail('{{route('admin.product.show',$item->id)}}')" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $products->links('theme.app.pagination') }} 