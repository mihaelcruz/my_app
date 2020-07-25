<?php

namespace App\Http\Controllers;
use App\Http\Requests\PeliculaFormRequest;
use App\Pelicula;
use App\Categoria;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $peliculas = Pelicula::all();
      return view ('peliculas.index',['peliculas'=>$peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('peliculas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaFormRequest $request)
    {
      $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
      $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
      $extension = request('imagen')->getClientOriginalExtension();
      $newFileName = $fileName . '_' . time() . '.' . $extension;
      $path = request('imagen')->storeAs('public/movies', $newFileName);

      $pelicula = new Pelicula();
      $pelicula->nombre = request('nombre');
      $pelicula->categoria_id = request('categoria_id');
      $pelicula->imagen = $newFileName;
      $pelicula->save();
      return redirect('/peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('peliculas.show',['pelicula'=> Pelicula::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        return view('peliculas.edit',['pelicula'=> Pelicula::findOrFail($id)], compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeliculaFormRequest $request, $id)
    {
      $pelicula = Pelicula::findOrFail($id);
      if(!empty(request('imagen'))){
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('imagen')->storeAs('public/movies', $newFileName);
        $pelicula->imagen = $newFileName;
      }


      $pelicula->nombre = request('nombre');
      $pelicula->categoria_id = request('categoria_id');
      $pelicula->update();
      return redirect('/peliculas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
