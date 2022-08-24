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
                                <img class="img-fluid img-portfolio img-hover mb-3" src="images/{{$pelicula->imagen}}"  alt="{{$pelicula->titulo}}">
                            </a>
                            <form method="POST" action="{{ route('addFavorito') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                {{ Form::text('user_id', Auth::user() ? Auth::user()->id : '0', ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'hidden' => 'true']) }}
                                {{ Form::text('pelicula_id', $pelicula->id, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'hidden' => 'true']) }}
                                <button class="fav-btn btn btn-sm" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </button>
                            </form>
                            <div >
                                <h5 class="text-center title"><a href="{{ route('showPelicula',$pelicula->id) }}">{{ $pelicula->titulo }}</a></h5>
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