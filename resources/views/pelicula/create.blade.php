@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Crear Pelicula
                            </span>
                            <div class="float-right">
                                <a href="{{ route('peliculas.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('peliculas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pelicula.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
