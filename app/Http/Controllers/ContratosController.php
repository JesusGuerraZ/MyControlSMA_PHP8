<?php

namespace App\Http\Controllers;

use App\Models\contratos;
use Illuminate\Http\Request;

class ContratosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-contrato|crear-contrato|editar-contrato|borrar-contrato')->only('index');
        $this->middleware('permission:crear-contrato', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-contrato', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-contrato', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrato = contratos::all();
        return view('contratos.index', compact('contrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contratos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            // Validacion de datos ejemplo abajo
            'num_contrato' => 'required',
            'obj_contrato' => 'required',
            'prest_contrato' => 'required',
            'ident_contrato' => 'required',
            'tipo_contrato' => 'required',
            'servi_contrato' => 'required',
            'fec_susc_contrato' => 'required',
            'fec_ini_contrato' => 'required',
            'fec_ter_contrato' => 'required',
            'vig_contrato' => 'required',
            'val_contrato' => 'required',
            'reg_contrato' => 'required',
            'fecha_reg_contrato' => 'required',
            'mod_contrato' => 'required',
            'val_act_contrato' => 'required',
            'est_contrato' => 'required',
            'natu_contrato' => 'required',
            //'contenido' => 'required',
        ]);

        contratos::create($request->all());

        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function show(contratos $contratos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function edit(contratos $contrato)
    {
        return view('contratos.editar',compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contratos $contrato)
    {
        request()->validate([
            'num_contrato' => 'required',
            'obj_contrato' => 'required',
            'prest_contrato' => 'required',
            'ident_contrato' => 'required',
            'tipo_contrato' => 'required',
            'servi_contrato' => 'required',
            'fec_susc_contrato' => 'required',
            'fec_ini_contrato' => 'required',
            'fec_ter_contrato' => 'required',
            'vig_contrato' => 'required',
            'val_contrato' => 'required',
            'reg_contrato' => 'required',
            'fecha_reg_contrato' => 'required',
            'mod_contrato' => 'required',
            'val_act_contrato' => 'required',
            'est_contrato' => 'required',
            'natu_contrato' => 'required',
        ]);

        $contrato->update($request->all());

        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function destroy(contratos $contrato)
    {
        $contrato->delete();

        return redirect()->route('contratos.index');
    }
}
