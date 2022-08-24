@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Ver Categoria
                            </span>
                            <div class="float-right">
                                <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                Volver
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
