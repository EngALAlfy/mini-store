<div wire:ignore.self class="modal fade" id="add-sub-category-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.sub_category')</h4>
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

                <div wire:ignore class="form-group">
                    <select id="category_id" name="category_id"
                            class="form-control @error('category_id') is-invalid @enderror select2" style="width:100%">
                        <option value="0">@lang('all.category')</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
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

        $('#category_id').on('change', function () {
            let data = $('#category_id').select2("val");
            @this.
            set('category_id', data);
        });
    </script>
@endpush

