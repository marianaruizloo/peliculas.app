<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $peliculas = Pelicula::paginate();
        
        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Pelicula();
        $categorias = Categoria::pluck('nombre', 'id');
        return view('pelicula.create', compact('pelicula', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = $request->all();
        request()->validate(Pelicula::$rules);
        if ($request->imagen){
            $nombre = $request->titulo.'-'.$request->imagen->getClientOriginalName();
            $request->imagen->move('images', $nombre);
            $pelicula['imagen'] = $nombre;
        }
        $pelicula = Pelicula::create($pelicula);
        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula Creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->middleware('auth');
        $pelicula = Pelicula::find($id);
        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $categorias = Categoria::pluck('nombre', 'id');
        return view('pelicula.edit', compact('pelicula', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        
        $peliculaEditada = $request->all();
        request()->validate(Pelicula::$rules);
        if ($request->imagen){
            $nombre = $request->titulo.'-'.$request->imagen->getClientOriginalName();
            $request->imagen->move('images', $nombre);
            $peliculaEditada['imagen'] = $nombre;
        }

        $pelicula->update($peliculaEditada);

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id)->delete();

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula eliminada  con éxito');
    }
}
