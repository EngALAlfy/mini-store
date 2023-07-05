<div class="container" style="margin-top: 100px;">
    <h1 class="text-capitalize">{{$title ?? __('website.products')}}</h1>

    @if(!$random)
        <div class="mt-4">

            @include('includes.status')

            <div class="mb-3">
                <button wire:click="$set('category_id' , 0)"
                        class="category-filter @if($category_id == 0) active @endif"
                        data-category="all">@lang('website.all')</button>
                @foreach($categories as $category)
                    <button wire:click="$set('category_id' , {{$category->id}})"
                            class="category-filter @if($category_id == $category->id) active @endif"
                            data-category="{{$category->id}}">{{$category->name}}</button>
                @endforeach
            </div>

            @if(!empty($subCategories))
                <div class="mb-3">
                    <button wire:click="$set('sub_category_id' , 0)"
                            class="category-filter @if($sub_category_id == 0) active @endif"
                            data-category="all">@lang('website.all')</button>
                    @foreach($subCategories as $subCategory)
                        <button wire:click="$set('sub_category_id' , {{$subCategory->id}})"
                                class="category-filter @if($sub_category_id == $subCategory->id) active @endif"
                                data-category="{{$subCategory->id}}">{{$subCategory->name}}</button>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

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
        @include('website.includes.product-modal' , ['product' => $productDetails])
    @endisset

    @livewire('website-create-order')

    @push('scripts')
        <script>
            Livewire.on('show_product_details', () => {
                $('#productModal').modal('show');
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
