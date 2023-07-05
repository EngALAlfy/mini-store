<!-- Product Modal -->
<div wire:ignore.self class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h4 class="modal-title">@lang('website.place_order')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('includes.status')

                <div class="form-group">
                    <label for="product">@lang('all.product')</label>
                    <input id="product" class="form-control is-valid" value="{{optional($product)->name}}" readonly>
                </div>

                <div class="form-group">
                    <input required wire:model.defer="client_name" name="client_name"
                           class="form-control @error('client_name') is-invalid @enderror" placeholder="@lang('all.name')">
                    @error('client_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" required wire:model.defer="client_email" name="client_email"
                           class="form-control @error('client_email') is-invalid @enderror" placeholder="@lang('all.email')">
                    @error('client_email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" required wire:model.defer="client_phone" name="client_phone"
                           class="form-control @error('client_phone') is-invalid @enderror" placeholder="@lang('all.phone')">
                    @error('client_phone')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea wire:model.defer="message" rows="5" name="message"
                              class="form-control @error('message') is-invalid @enderror"
                              placeholder="@lang('all.message')">
                    </textarea>
                    @error('message')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click.prevent="save()">@lang('website.place_order')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('all.cancel')</button>
            </div>
        </div>
    </div>
</div>

