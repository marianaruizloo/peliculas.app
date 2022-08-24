@extends('layout')

@section('content')
    <!-- Page Content -->
    <link rel="stylesheet" type="text/css" href="https://assets.jumpseller.com/store/bootstrap/themes/382017/component_slider.css?1619113824">
    <link rel="stylesheet" type="text/css" href="https://assets.jumpseller.com/store/bootstrap/themes/382017/component_instagram.css?1619113824">
    <link rel="stylesheet" type="text/css" href="https://assets.jumpseller.com/store/bootstrap/themes/382017/component_testimonials.css?1619113824">
    <div id="components">
        <div id="component-76145">
            <div id="featured-products-76145" class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-header">Lista de Peliculas</h2>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @foreach ($peliculas as $pelicula)
                    <div class="col-md-3 col-6 product-block">
                        <div class="product-card">
                            <a href="{{ route('showPelicula',$pelicula->id) }}">
                                <img class="img-fluid img-portfolio img-hover mb-3" src="../images/{{$pelicula->imagen}}"  alt="{{$pelicula->titulo}}">
                            </a>
                            <form method="POST" action="{{ route('removeFavorito') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                {{ Form::text('user_id', Auth::user() ? Auth::user()->id : '0', ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'hidden' => 'true']) }}
                                {{ Form::text('pelicula_id', $pelicula->id, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'hidden' => 'true']) }}
                                <button class="fav-btn btn btn-sm" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg>
                                </button>
                            </form>
                            <div >
                                <h3 class="text-center title"><a href="{{ route('showPelicula',$pelicula->id) }}">{{ $pelicula->titulo }}</a></h3>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- /.row -->
            </div>
        </div>
    </div>
    <style>
        .product-block {
            padding: 20px;
        }
        .product-card {
            border: 1px solid #0D84FD;
            padding: 5px;
            border-radius: 10px;
        }
        .fav-btn{
            margin-left: 15px;
        }
        .title{
            margin: 10px 0;
            font-size:15px;
        }
        img{
            display: block;
            margin: 0 auto;
            height: 200px !important;
            width: auto;
        }
    </style>
@endsection