{{-- <div class="custom-file d-none">
    <label for="photo" class="custom-file-label text-left">صورة البوست</label>
    <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*">
</div> --}}


<div wire:ignore title="@lang('all.choose_photo')" class="form-group">

    <label>@lang('all.photo')</label>

    <input wire:model="image" type="file" class="d-none" name="photo" id="photo" accept="image/*">


    <div wire:ignore class="row justify-content-center m-0" style="border: 1px dashed black;border-radius: 10px;">
        <div class="col-md-7 text-center">
            <img style="cursor: pointer;width:{{ $width }}px;height: {{ $hight }}px;" class="m-t-20 m-b-20" id="image"
                src="{{ asset('assets/img/file-input-placeholder.png') }}" class="img-fluid">
        </div>

    </div>

    @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <small class="form-text text-muted">@lang('all.photo_allow_dim', ['hight' => $hight, 'width' => $width])</small>
    <small class="form-text text-muted">@lang('all.photo_allow_size')</small>
    <small class="form-text text-muted">@lang('all.photo_allow_mimes')</small>

</div>






@push('scripts')
    <script>
        $(function() {

            initPhotoEdit();

            $('#image').click(function() {
                $('#photo').click();
            });

        });


        function initPhotoEdit() {
            $('#photo').on('change', function() {
                $('#removePhotoBtn').removeClass('d-none');

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            });
        }

    </script>
@endpush
