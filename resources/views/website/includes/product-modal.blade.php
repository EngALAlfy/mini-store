<!-- Product Modal -->
<div wire:ignore.self class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="cover-image">
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                </div>
                <div class="product-info">
                    <h3>{{$product->name}}</h3>
                    <p>{{$product->getPrice()}}</p>
                    <p>{{$product->desc}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="createOrder({{$product->id}})" data-dismiss="modal">@lang('website.place_order')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('all.close')</button>
            </div>
        </div>
    </div>
</div>

