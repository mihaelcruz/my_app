<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view ('usuarios.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = request('name');
        $usuario->email = request('email');
        $pass = request('password');
        $usuario->password = Hash::make($pass);
        $usuario->save();
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('usuarios.show',['user'=> User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('usuarios.edit',['user'=> User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $usuario = User::findOrFail($id);
      $usuario->name = $request->get('name');
      $usuario->email = $request->get('email');
      $usuario->update();
      return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $usuario = User::findOrFail($id);
      $usuario->delete();
      return redirect('/usuarios');
    }
}
