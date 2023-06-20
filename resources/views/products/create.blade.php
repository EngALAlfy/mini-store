<div wire:ignore.self class="modal fade" id="add-product-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.product')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.status')

                <div class="form-group">
                    <input wire:model.defer="name" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('all.name')">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div wire:ignore class="form-group">
                    <select name="sub_category_id" id="sub_category_id"
                            class="form-control @error('sub_category_id') is-invalid @enderror select2" style="width: 100%">
                        <option value="0">@lang('all.category')</option>

                        @foreach ($categories as $category)
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach ($category->subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        @endforeach
                    </select>
                    @error('sub_category_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input placeholder="@lang('all.price')" type="number" step="0.5" wire:model.defer="price" name="price"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                @include('includes.image-input', ['height' => 300, 'width' => 300])

                <div class="form-group">
                    <label for="desc">@lang('all.desc')</label>
                    <textarea rows="5" id="desc" wire:model.defer="desc" name="desc"
                              class="@error('desc') is-invalid @enderror form-control"
                              placeholder="@lang('all.desc')"></textarea>
                    @error('desc')
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

@push('styles')
    <link
        rel="stylesheet"
        href="{{asset("assets/adminLTE/plugins/select2/css/select2.css")}}"
        type="text/css"
    />

    <style>
        .select2-results__group{
            text-decoration:underline;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{asset("assets/adminLTE/plugins/select2/js/select2.full.js")}}"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {
                $('.select2').select2();
            });

        });

        $('#sub_category_id').on('change', function () {
            let data = $('#sub_category_id').select2("val");
            console.log(data)
            @this.set('sub_category_id', data);
        });
    </script>
@endpush
