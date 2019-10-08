@extends('layout.app')
@section('titulo', 'Inicia sesión')
@section('container')

            <div class="row align-items-center">
                <div class="col-md-5 mb30">
                    <img src="{{asset('images/login.png')}}"  alt="" class="img-fluid">
                </div>
                <div class="col-md-6 offset-md-1 mb30">
                    <h3 class="font300 mb20 h2">Inicia <span class="text-primary">{{ __('sesión') }}</span></h3>
                    <p>Portal de servicio administrativo para el registro de la convocatoria.</p><br>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg mb20" name="email" value="{{ old('email') }}" placeholder="{{ __('Usuario') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg mb20" name="password"  placeholder="{{ __('Contraseña') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 text-right">
                                <button type="submit" class="btn btn-primary btn-outline-secondary btn-block form-control-lg mb20">{{ __('Entrar') }}</button>
                            </div>
                        </div>
                    </form>
                </div><!--/div-->
            </div>
@endsection
