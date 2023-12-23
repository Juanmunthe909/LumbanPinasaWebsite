<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Order Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Order Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Order {{ $order->code }}</h5>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Product Details</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col" class="text-end">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $item)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="{{ asset('images/panen/'.$item->product->cover) }}" alt="" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fs-15"><a>{{ $item->product->title }}</a></h5>
                                        </div>
                                    </div>
                                </td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="fw-medium text-end">
                                    Rp. {{ number_format($item->quantity*$item->product->price) }}
                                </td>
                            </tr>
                            
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row">Total (USD) :</th>
                                                <th class="text-end">Rp. {{ number_format($order->total) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hstack gap-2 justify-content-start">
                    <a class="btn btn-light" href="javascript:;" onclick="load_list(1);">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->