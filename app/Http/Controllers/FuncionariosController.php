<?php

namespace App\Http\Controllers;

use App\Models\funcionarios;
use Illuminate\Http\Request;
use App\Models\Regional;


class FuncionariosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-funcionario|crear-funcionario|editar-funcionario|borrar-funcionario')->only('index');
        $this->middleware('permission:crear-funcionario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-funcionario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-funcionario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $funcionarios = funcionarios::all();
        return view('funcionarios.index', compact('funcionarios'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $regionales = Regional::where('dir_regional','!=', null)->get();
        $filtro_regional = $regionales->pluck('nom_regional', 'nom_regional')->all();

        return view('funcionarios.crear', compact('filtro_regional'));
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
            'ced_funcionario' => 'required',
            'tel_funcionario' => 'required',
            'nom_ape_funcionario' => 'required',
            'cel_funcionario' => 'required',
            'nom_regional' => 'required'

        ]);
        $input = $request->all();
        $funcionario = funcionarios::create($input);
        $funcionario = $request->input('filtro_regional');

        return redirect()->route('funcionarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(funcionarios $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(funcionarios $funcionario)
    {
        $regionales = Regional::where('dir_regional','!=', null)->get();
        $filtro_regional = $regionales->pluck('nom_regional', 'nom_regional')->all();
        return view('funcionarios.editar', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, funcionarios $funcionario)
    {
        request()->validate([
            'ced_funcionario' => 'required',
            'tel_funcionario' => 'required',
            'nom_ape_funcionario' => 'required',
            'cel_funcionario' => 'required',
            'nom_regional' => 'required'
        ]);

        $input = $request->all();
        $funcionariox = funcionarios::create($input);
        $funcionariox = $request->input('filtro_regional');

        return redirect()->route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(funcionarios $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index');
    }
}
