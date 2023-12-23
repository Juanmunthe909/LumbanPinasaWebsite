<x-app-layout title="Checkout">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Checkout</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="#">
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 active" id="pills-finish-tab" data-bs-toggle="pill" data-bs-target="#pills-finish" type="button" role="tab" aria-controls="pills-finish" aria-selected="true" data-position="3"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="text-center py-5">

                                <div class="mb-4">
                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#695eef,secondary:#73dce9" style="width:120px;height:120px"></lord-icon>
                                </div>
                                <h5>Terimakasih Telah Melakukan Pembelian </h5>
                                {{-- <p class="text-muted">You will receive an order confirmation email
                                    with
                                    details of your order.</p> --}}

                                   <h3 class="fw-semibold">ID Pemesanan: <a href="javascript:;" class="text-decoration-underline">{{ $order->code }}</a></h3>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Data Pemesanan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 90px;" scope="col">Produk</th>
                                    <th scope="col">Info Produk</th>
                                    <th scope="col" class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $orderDetail = \App\Models\OrderDetail::where('order_id', $order->id)->get();
                                @endphp
                                @foreach ($orderDetail as $item)
                                <tr>
                                    <td>
                                        <div class="avatar-md bg-light rounded p-1">
                                            <img src="{{ asset('images/panen/'.$item->product->cover) }}" alt="" class="img-fluid d-block">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="fs-14"><a href="{{ route('web.product.show', $item->product->id) }}" class="text-dark">{{ $item->product->title }}</a>
                                        </h5>
                                        <p class="text-muted mb-0">Rp. {{ number_format($item->product->price) . ' x ' . $item->quantity }} </p>
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($item->subtotal) }}</td>
                                </tr>
                                @endforeach
                                <tr class="table-active">
                                    <th colspan="2">Total (IDR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold">
                                            Rp. {{ number_format($order->total) }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</x-app-layout>