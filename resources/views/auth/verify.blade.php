@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
<<<<<<< HEAD
                            {{ __('Enlace de restablecimiento de contraseña por correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, compruebe si ha recibido un enlace de verificación en su correo electrónico.') }}
                    {{ __('Si no ha recibido el correo electrónico') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otro') }}</button>.
=======
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
>>>>>>> aa49d920e4b842ef0fcf84891abdabe605afddc6
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
