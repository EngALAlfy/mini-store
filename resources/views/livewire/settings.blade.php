<div>

    @include('includes.status')

    <div class="card">
        <div class="card-body">

            <div class=" row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" id="fixed_navbar" type="checkbox" wire:model="fixed_navbar">
                            <label class="custom-control-label" for="fixed_navbar">@lang('all.fixed_navbar')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" id="collaps_sidebar" type="checkbox"
                                wire:model="collaps_sidebar">
                            <label class="custom-control-label" for="collaps_sidebar">@lang('all.collaps_sidebar')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" id="fullscreen" data-widget="fullscreen"
                                type="checkbox">
                            <label class="custom-control-label" for="fullscreen">@lang('all.fullscreen')</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" id="dark_mode" type="checkbox" wire:model="dark_mode">
                            <label class="custom-control-label" for="dark_mode">@lang('all.dark_mode')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" id="delete_dialog" type="checkbox"
                                wire:model="delete_dialog">
                            <label class="custom-control-label" for="delete_dialog">@lang('all.delete_dialog')</label>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="font">@lang('all.font')</label>
                        <select class="custom-select @error('font') is-invalid @enderror" id="font"
                            wire:model="font" placeholder="@lang('all.font')">

                            <option id="sans-serif" value="sans-serif">@lang('all.font_num_0')</option>

                            @for ($i = 1; $i <= 5; $i++)
                                <option id="font-{{ $i }}" value="{{ $i }}.ttf">
                                    {{ __('all.font_num_' . $i) }}</option>
                            @endfor

                        </select>
                        @error('font')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notification_sound">@lang('all.notification_sound')</label>
                        <select class="custom-select @error('notification_sound') is-invalid @enderror"
                            id="notification_sound" wire:model="notification_sound" placeholder="@lang('all.notification_sound')">

                            <option id="no_sound" value="no_sound">@lang('all.no_sound')</option>

                            @for ($i = 1; $i <= 5; $i++)
                                <option id="notification_sound-{{ $i }}" value="{{ $i }}.wav">
                                    {{ __('all.notification_sound_num_' . $i) }}</option>
                            @endfor

                        </select>
                        @error('notification_sound')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                     <div class="form-group">
                        <label for="perPage">@lang('all.perPage')</label>
                        <select class="custom-select @error('perPage') is-invalid @enderror"
                            id="perPage" wire:model="perPage" placeholder="@lang('all.perPage')">

                            <option id="null" value="null">@lang('all.perPage')</option>
                            <option id="5" value="5">5</option>
                            <option id="10" value="10">10</option>
                            <option id="15" value="15">15</option>
                            <option id="20" value="20">20</option>
                            <option id="20" value="20">30</option>

                        </select>
                        @error('notification_sound')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6 ">
                    <a class="btn btn-sm btn-warning btn-block text-right" href="{{ route('clear-cache') }}"><i
                            class="fa fa-trash mr-2"></i>@lang('all.clear_cache')</a>
                    <a class="btn btn-sm btn-info btn-block text-right" href="{{ route('backup.index') }}"
                        target="_blank"><i class="fa fa-retweet mr-2"></i>@lang('all.backup')</a>
                </div>
            </div>

        </div>

        @push('styles')
            <style>
                #sans-serif {
                    font-family: sans-serif;
                }
            </style>
        @endpush
        @push('styles')
            @for ($i = 1; $i <= 5; $i++)
                <style>
                    @font-face {
                        font-family: '{{ $i }}.ttf';
                        src: url('{{ asset('assets/fonts/' . $i . '.ttf') }}');
                        font-weight: 400;
                        font-style: normal
                    }

                    #font-{{ $i }} {
                        font-family: '{{ $i }}.ttf';
                    }
                </style>
            @endfor
        @endpush

        @push('scripts')
            <script>
                $('#collaps_sidebar').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('body').addClass('sidebar-collapse')
                        $(window).trigger('resize')
                    } else {
                        $('body').removeClass('sidebar-collapse')
                        $(window).trigger('resize')
                    }
                });

                $('#fixed_navbar').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('body').addClass('layout-navbar-fixed')
                    } else {
                        $('body').removeClass('layout-navbar-fixed')
                    }
                });

                $('#dark_mode').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('body').addClass('dark-mode')
                        $('nav.navbar').addClass('navbar-dark')
                        $('nav.navbar').removeClass('navbar-light')
                        $('nav.navbar').removeClass('navbar-white')
                    } else {
                        $('body').removeClass('dark-mode')
                        $('nav.navbar').removeClass('navbar-dark')
                        $('nav.navbar').addClass('navbar-light')
                        $('nav.navbar').addClass('navbar-white')
                    }
                });

                $('#notification_sound').change(function() {
                    var sound = $(this).find(":checked").val();
                    var audio = new Audio(`{{ asset('assets/sound/${sound}') }}`);
                    audio.play()
                });
            </script>
        @endpush
    </div>


 <div class="card card-secondary">
        <div class="card-header">@lang('all.contact_us')</div>
        <div class="card-body">
            <div class=" row justify-content-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="phone">@lang('all.phone')</label>
                        <input class="form-control @error('phone') is-invalid @enderror" id="phone"
                            wire:model="phone" placeholder="@lang('all.phone')"/>
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">@lang('all.email')</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                            wire:model="email" placeholder="@lang('all.email')"/>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">@lang('all.address')</label>
                        <input class="form-control @error('address') is-invalid @enderror" id="address"
                            wire:model="address" placeholder="@lang('all.address')"/>
                        @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


     <div class="card card-warning">
        <div class="card-header">@lang('all.notifications')</div>
        <div class="card-body">
            <div class=" row justify-content-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fcm_token">@lang('all.fcm_token')</label>
                        <input class="form-control @error('fcm_token') is-invalid @enderror" id="fcm_token"
                            wire:model="fcm_token" placeholder="@lang('all.fcm_token')"/>
                        @error('fcm_token')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card card-success">
        <div class="card-header">@lang('all.ads')</div>
        <div class="card-body">
            <div class=" row justify-content-center">
                <div class="col-md-12">


                    <div class="form-group">
                        <label for="header_ad">@lang('all.head_code')</label>
                        <textarea rows="5" class="form-control @error('head_code') is-invalid @enderror" id="head_code"
                            wire:model="head_code" placeholder="@lang('all.head_code')"></textarea>
                        @error('head_code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="header_ad">@lang('all.header_ad')</label>
                        <textarea rows="5" class="form-control @error('header_ad') is-invalid @enderror" id="header_ad"
                            wire:model="header_ad" placeholder="@lang('all.header_ad')"></textarea>
                        @error('header_ad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="side_ad">@lang('all.side_ad')</label>
                        <textarea rows="5" class="form-control @error('header_ad') is-invalid @enderror" id="side_ad"
                            wire:model="side_ad" placeholder="@lang('all.side_ad')"></textarea>
                        @error('side_ad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="footer_ad">@lang('all.footer_ad')</label>
                        <textarea rows="5" class="form-control @error('footer_ad') is-invalid @enderror" id="footer_ad"
                            wire:model="footer_ad" placeholder="@lang('all.footer_ad')"></textarea>
                        @error('footer_ad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header">@lang('all.social')</div>
        <div class="card-body">
            <div class=" row justify-content-center">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="facebook">@lang('all.facebook')</label>
                                <input class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                                    wire:model="facebook" placeholder="@lang('all.facebook')">
                                @error('facebook')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="facebook_followers_count">@lang('all.followers_count')</label>
                                <input class="form-control @error('facebook_followers_count') is-invalid @enderror"
                                    id="facebook_followers_count" wire:model="facebook_followers_count"
                                    placeholder="@lang('all.followers_count')">
                                @error('facebook_followers_count')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="youtube">@lang('all.youtube')</label>
                                <input class="form-control @error('youtube') is-invalid @enderror" id="youtube"
                                    wire:model="youtube" placeholder="@lang('all.youtube')">
                                @error('youtube')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="youtube_followers_count">@lang('all.followers_count')</label>
                                <input class="form-control @error('youtube_followers_count') is-invalid @enderror"
                                    id="youtube_followers_count" wire:model="youtube_followers_count"
                                    placeholder="@lang('all.followers_count')">
                                @error('youtube_followers_count')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="instagram">@lang('all.instagram')</label>
                                <input class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                                    wire:model="instagram" placeholder="@lang('all.instagram')">
                                @error('instagram')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="instagram_followers_count">@lang('all.followers_count')</label>
                                <input class="form-control @error('instagram_followers_count') is-invalid @enderror"
                                    id="instagram_followers_count" wire:model="instagram_followers_count"
                                    placeholder="@lang('all.followers_count')">
                                @error('instagram_followers_count')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
