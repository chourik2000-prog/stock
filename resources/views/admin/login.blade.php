@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="container col-lg-5">
                <div class="login-box bg-white box-shadow" id="loginbox">
                    <div class="col-lg-12">
                        <div class="loader-logo"><img src="{{asset('vendors/images/logo-icon.png')}}" alt=""><h3> IAI-TOGO gestion de stock</h3></div>
                        <div>
                            <div class="card-header">{{ __("Saisir votre nom d'utilisateur et le mot de passe Admin") }}</div>
                            <div class="card-body">
                                <form class="form" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-6 col-form-label text-md-end">{{ __("Nom d'utilisateur") }}</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-6 col-form-label text-md-end">{{ __('Mot de passe') }}</label>
                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Se souvenir de moi') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                {{ __('Connexion') }}
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Mot de passe oublié?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection