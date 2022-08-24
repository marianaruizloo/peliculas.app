@extends('layouts.app')

@section('content')
<style>
    .card {
        padding-left: 0px;
        padding-right: 0px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4 card">
                            <div class="card-header"><a href="{{route('categorias.index')}}">Categorias</a></div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4 card">
                            <div class="card-header"><a href="{{route('peliculas.index')}}">Peliculas</a></div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
