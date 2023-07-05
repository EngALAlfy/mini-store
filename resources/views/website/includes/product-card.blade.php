<div class="col-md-3 col-sm-6 col-6 mb-4">
    <div class="product-card" data-category="{{$product->category_id}}">
        <img src="{{$product->image}}"
             style="cursor: pointer" wire:click.prevent="setProduct({{$product}})" alt="{{$product->name}}" height="200">
        <div class="p-l-20 p-r-20 p-b-20 p-t-10 text-dark">
            <h3>{{$product->name}}</h3>
            <p>{{$product->getPrice()}}</p>
            <button class="btn btn-primary"
                    wire:click.prevent="createOrder({{$product->id}})">@lang('website.order_now')</button>
        </div>
    </div>
</div>
