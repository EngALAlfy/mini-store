<div class="form-group">

    @php
        $field_name = $field_name ??"new-image";
    @endphp
    <label>@lang('all.photo')</label>

    <input wire:model="image" type="file" class="d-none" name="{{$field_name}}" id="{{$field_name}}" accept="image/*">


    <div id="{{$field_name}}-input-zone" data-toggle="tooltip" title="@lang('all.choose_photo')" class="row justify-content-center m-0"
         style="border: 1px dashed @error('image') red @enderror;border-radius: 10px;">
        <div class="col-12 d-flex justify-content-center align-items-center"
             style="cursor: pointer;height: {{ $height }}px;">
            <img wire:loading.remove style="width:{{ $width }}px;max-height: {{ $height - 40 }}px;"
                 class="m-t-20 m-b-20 img-fluid" id="image-preview"
                 src="{{ $image ? (is_string($image) ? $image : $image->temporaryUrl()) : asset('assets/img/file-input-placeholder.png') }}">

            <div wire:loading wire:target="image" class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    @error('image')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror

    <small class="form-text text-muted">@lang('all.photo_allow_dim', ['height' => $height, 'width' => $width])</small>
    <small class="form-text text-muted">@lang('all.photo_allow_size')</small>
    <small class="form-text text-muted">@lang('all.photo_allow_mimes')</small>

</div>

@push("scripts")
    <script>
        $('#{{$field_name}}-input-zone').click(function () {
            $('#{{$field_name}}').click();
        });
    </script>
@endpush

