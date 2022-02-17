<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
    /**
     * Index con todos los entrenadores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entrenadores =  Entrenador::all();

        return view('entrenadores.index', compact('entrenadores'));
    }

    /**
     * Retorna vista Crear Entrenadores
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        return view('entrenadores.create');

    }


    /**
     * Guarda Entrenador en la bd
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $req)
    {
        //
        $e = new Entrenador;
        $e->nombre = $req->ne;
        $e->rol = $req->re;
        $e->comentario = $req->ce;
        $e->imagen = $req->ie;
        $e->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function editView(Request $req)
    {
        $id_entrenador = $req->id_ent;
        return view('entrenadores.edit', compact('id_entrenador'));
    }

    /**
     * Edita Entrenadores
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $e = Entrenador::where('id', $req->id)->find(1);

        $e->nombre = $req->ne;
        $e->rol = $req->re;
        $e->rotacion = $req->se;
        $e->comentario = $req->ce;
        $e->imagen = $req->ie;
        $e->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
        Entrenador::where('id', $req->id)->delete();
        return redirect('entrenadores');
    }
}
