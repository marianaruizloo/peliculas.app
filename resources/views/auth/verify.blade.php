@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu correo electrónico</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuevo link se ha enviado a tu dirección de correo electrónico
                        </div>
                    @endif

                    Antes de continuar, por favor verifica tu dirección de correo electrónico
                    Si no lo haz recibido
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">haz click aquí y te enviaremos otro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
