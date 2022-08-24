@extends('layouts.app')

@section('template_title')
    {{ $pelicula->name ?? 'Show Pelicula' }}
@endsection

@section('content')
    <style>
        .form-group{
            line-height:2;
        }
    </style>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Pelicula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('peliculas.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../images/{{$pelicula->imagen}}" alt="123" width="100%">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <strong>Titulo:</strong>
                                    {{ $pelicula->titulo }}
                                </div>
                                <div class="form-group">
                                    <strong>Director:</strong>
                                    {{ $pelicula->director }}
                                </div>
                                <div class="form-group">
                                    <strong>Descripcion:</strong>
                                    {{ $pelicula->descripcion }}
                                </div>
                                <div class="form-group">
                                    <strong>Duracion:</strong>
                                    {{ $pelicula->duracion }}
                                </div>
                                <div class="form-group">
                                    <strong>Trailer:</strong>
                                    <a href="{{ $pelicula->urltrailer }}" target="_blank">{{ $pelicula->urltrailer }}</a>
                                </div>
                                <div class="form-group">
                                    <strong>Categoria:</strong>
                                    {{ $pelicula->categoria->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    {{ $pelicula->imagen }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
