<div class="container" style="margin-top: 50px;">
    <div class="row mt-4">
        @forelse($products as $product)
            @include('website.includes.product-card' , ['product' => $product])
        @empty
            <div class="col alert alert-info m-l-10 m-r-10 m-t-50 m-b-200">
                <h5><i class="icon fa fa-info"></i> @lang('all.no_data')</h5>
            </div>
        @endforelse
    </div>

    @isset($productDetails)
        @include('website.includes.product-modal' , ['id' => 'productModal-'.$category_id , 'product' => $productDetails])
    @endisset

    @livewire('website-create-order')

    @push('scripts')
        <script>
            Livewire.on('show_category_product_details_{{$category_id}}', () => {
                $('#productModal-{{$category_id}}').modal('show');
            });

            Livewire.on('order_create', () => {
                $('#orderModal').modal('show');
            });

            Livewire.on('order_stored', () => {
                $('#orderModal').modal('hide');
            });
        </script>
    @endpush
</div>
