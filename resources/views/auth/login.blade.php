@extends('auth.app')
@section('htmlheader_title', 'Login')
@section('conteudo')

<div class="card card-outline card-primary">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><b>{{ __('Login') }}</b></p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="E-mail"
                    name='email'>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Senha"
                    name='password'>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Lembre-se
                        </label>
                    </div>
                </div>


                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}</button>
                </div>
                <p class="mb-1">
                    <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" 
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif-->
                    <a class="btn btn-link" href="/">
                        <!-- "{{ route('password.request') }}" -->
                        {{ __('Forgot Your Password?') }}
                    </a>
                </p>
                <!-- /.col -->
            </div>
        </form>


    </div>
    <!-- /.login-card-body -->
</div>
@endsection