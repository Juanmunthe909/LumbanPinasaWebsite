<x-app-layout title="Keranjang">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Daftar Keranjang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">FunYields</a></li>
                        <li class="breadcrumb-item active">Daftar Keranjang</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div id="list_result"></div>
    <div id="content_detail"></div>
    @section('custom_js')
    <script>
        load_list(1);
        $(document).ready(function(){
            load_cart();
        });
        function update_quantity(url){
            $.ajax({
                url: url,
                type: 'PATCH',
                success: function(data){
                    $('.total-product-price').html(data.subtotal);
                    $('.data-product').attr('data-quantity', data.quantity);
                    load_cart(localStorage.getItem("route_cart"));
                    load_list(1);
                }
            });
        }
        function input_quantity(url){
            let data = "quantity=" + $('#qty').val();
            $.ajax({
                url: url,
                type: 'PATCH',
                data: data,
                success: function(data){
                    $('.total-product-price').html(data.subtotal);
                    $('#qty').val(data.quantity);
                    load_cart(localStorage.getItem("route_cart"));
                    load_list(1);
                }
            });

        }
        function load_cart(){
            $('.data-product').each(function(){
                var price = $(this).data('price');
                var quantity = $(this).data('quantity');
                var total = price * quantity;
                $(this).find('.total-product-price').html('Rp '+total.toFixed(2));
                $(this).find('.total-product-price').data('subtotal', total);
            });
            var total_price = 0;
            $('.total-product-price').each(function(){
                total_price += $(this).data('subtotal');
            });
            $('#cart-total').html('Rp '+total_price.toFixed(2));
        }
        function tombol_hapus(url){
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(data){
                    load_cart(localStorage.getItem("route_cart"));
                    load_list(1);
                }
            });
        }
    </script>  
    @endsection
</x-app-layout>