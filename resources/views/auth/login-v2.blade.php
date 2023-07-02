@extends('layout.auth')

@section('title')
    @lang('all.login')
@endsection

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1" href="/">{{ __('website.name') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">@lang('all.login_to_system')</p>

                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf

                    @include('includes.status')
                    <div class="input-group mb-3">
                        <input class="form-control" name="email" type="text" value="{{ old('email') }}"
                            placeholder="@lang('all.email')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" name="password" type="password" value="{{ old('password') }}"
                            placeholder="@lang('all.password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input id="remember" name="remember" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    @lang('all.remember')
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button class="btn btn-block btn-primary" type="submit">
                            @lang('all.sign_in')
                        </button>

                        @env('local')
                            <a class="btn btn-block btn-warning" href="{{ route('demoLogin') }}">
                                @lang('all.demo_sign_in')
                            </a>
                        @endenv
                    </div>

                </form>

                <!-- /.social-auth-links -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
