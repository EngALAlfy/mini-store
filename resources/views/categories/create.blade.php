<div wire:ignore.self class="modal fade" id="add-category-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.category')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.status')

                <div class="form-group">
                    <input wire:model.defer="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" placeholder="@lang('all.name')">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                @include('includes.image-input' , ["height" => 300 , "width" => 300])

                <div class="form-group">
                    <textarea wire:model.defer="desc" name="desc"
                              class="form-control @error('desc') is-invalid @enderror" placeholder="@lang('all.desc')"
                              rows="4"></textarea>
                    @error('desc')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input wire:model.defer="color" name="color"
                           class="form-control @error('color') is-invalid @enderror" placeholder="@lang('all.color')">
                    @error('color')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.cancel')</button>
                <button wire:click="store" class="btn btn-primary">
                    @lang('all.save')
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

