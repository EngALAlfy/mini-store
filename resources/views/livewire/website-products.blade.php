<div class="container" style="margin-top: 100px;">
    <h1 class="text-capitalize">@lang('website.products')</h1>
    <div class="my-4">

        @include('includes.status')

        <div class="mb-3">
            <button wire:click="$set('category_id' , 0)" class="category-filter @if($category_id == 0) active @endif"
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
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="product-card" data-category="{{$product->$category_id}}">
                    <img src="{{$product->image}}" class="image-previewed" alt="{{$product->name}}" height="200">
                    <div class="p-l-20 p-r-20 p-b-20 p-t-10">
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->getPrice()}}</p>
                        <button class="btn btn-primary" wire:click.prevent="setProduct({{$product->id}})">@lang('website.order_now')</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col alert alert-info m-l-10 m-r-10 m-t-50 m-b-200">
                <h5><i class="icon fa fa-info"></i> @lang('all.no_data')</h5>
            </div>
        @endforelse
    </div>


    @isset($productDetails)
        @include('website.includes.product-modal' , ['product' => $productDetails])
        @livewire('website-create-order')
    @endisset

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
