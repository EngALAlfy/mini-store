<div wire:ignore.self class="modal fade" id="add-post-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.post')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.status')
                <div class="form-group">
                    <input wire:model="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="@lang('all.name')">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input wire:model="url" name="url" class="form-control @error('url') is-invalid @enderror"
                        placeholder="@lang('all.url')">
                    @error('url')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="datetime-local" wire:model="date" name="date"
                        class="form-control @error('date') is-invalid @enderror" placeholder="@lang('all.date')">
                    @error('date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="category_id" name="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="0">@lang('all.category')</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <select wire:model="state_id" name="state_id"
                        class="form-control @error('state_id') is-invalid @enderror">
                        <option value="0">@lang('all.state')</option>

                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @error('state_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="price_id" name="price_id"
                        class="form-control @error('price_id') is-invalid @enderror">
                        <option value="0">@lang('all.price')</option>
                        @foreach ($prices as $price)
                            <option value="{{ $price->id }}">{{ $price->name }}</option>
                        @endforeach
                    </select>
                    @error('price_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                @include('includes.image-copper', ['hight' => 200, 'width' => 200])

                <div class="form-group">
                    <label for="content">@lang('all.content')</label>
                    <textarea rows="5" id="content" wire:model="content" name="content" class="@error('content') is-invalid @enderror form-control"
                        placeholder="@lang('all.content')"></textarea>
                    @error('content')
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
