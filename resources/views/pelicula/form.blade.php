<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 form-group">
                {{ Form::label('titulo') }}
                {{ Form::text('titulo', $pelicula->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
                {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('director') }}
                {{ Form::text('director', $pelicula->director, ['class' => 'form-control' . ($errors->has('director') ? ' is-invalid' : ''), 'placeholder' => 'Director']) }}
                {!! $errors->first('director', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                {{ Form::label('descripcion') }}
                {{ Form::text('descripcion', $pelicula->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('duracion') }}
                {{ Form::time('duracion', $pelicula->duracion, ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : '')]) }}
                {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('urltrailer') }}
                {{ Form::text('urltrailer', $pelicula->urltrailer, ['class' => 'form-control' . ($errors->has('urltrailer') ? ' is-invalid' : ''), 'placeholder' => 'Urltrailer']) }}
                {!! $errors->first('urltrailer', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
            {{ Form::label('Categoria') }}
            {{ Form::select('categoria_id', $categorias, $pelicula->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => '-- SELECCIONE UNA CATEGORIA --']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 row form-group">
                <div class="col-md-5"></div>
            {{ Form::label('Imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Grabar</button>
    </div>
</div>
<style>
    .row {
        margin-bottom: 15px;
    }
</style>