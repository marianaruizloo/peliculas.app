<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('admin');
    }

    public function index()
    {
        $peliculas = Pelicula::paginate();
        return view('home', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    public function showPelicula($id)
    {
        $pelicula = Pelicula::find($id);

        return view('showPelicula', compact('pelicula'));
    }

    public function favoritos($idUser)
    {
        if ($idUser) {
            $peliculas = User::find($idUser)->favoritos;
            return view('favoritos', compact('peliculas'));
        }
        return redirect()->route('home');
    }

    public function addFavorito(Request $request)
    {
        request()->validate(Favorito::$rules);
        $existe = Favorito::where('pelicula_id', $request->pelicula_id)->where('user_id', $request->user_id)->get();
        if ($existe->all() == []) {
            $favorito = Favorito::create($request->all());
            return redirect()->route('home')
            ->with('success', 'Se añadió a tu lista de favoritos.');
        }else{
            return redirect()->route('home')
            ->with('success', 'La película ya se encuentra en tu lista de favoritos');
        }
    }

    public function removeFavorito(Request $request)
    {
        $delete = Favorito::where('user_id', $request->user_id)->where('pelicula_id',$request->pelicula_id)->delete();
        return redirect()->route('favoritos',$request->user_id)
            ->with('success', 'Se eliminó de favoritos.');
    }
}
