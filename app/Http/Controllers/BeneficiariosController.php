<?php

namespace App\Http\Controllers;

use App\Models\beneficiarios;
use App\Models\funcionarios;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-beneficiarios|crear-beneficiarios|editar-beneficiarios|borrar-beneficiarios')->only('index');
         $this->middleware('permission:crear-beneficiarios', ['only' => ['create','store']]);
         $this->middleware('permission:editar-beneficiarios', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-beneficiarios', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
         $beneficiarios = beneficiarios::all();
         return view('beneficiarios.index',compact('beneficiarios'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionario = funcionarios::pluck('nom_ape_funcionario', 'nom_ape_funcionario')->all();

        return view('beneficiarios.crear', compact('funcionario'));

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
            'ced_beneficiario' => 'required',
            'nom_beneficiario' => 'required',
            'ape_beneficiario' => 'required',
            'dir_beneficiario' => 'required',
            'gen_beneficiario' => 'required',
            'id_parentesco' => 'required',
            //'fec_nac_beneficiario' => 'required',
            'edad_beneficiario' => 'required',
            'tel_beneficiario' => 'required',
            'nom_funcionario' => 'required',
        ]);

        $input = $request->all();
        $beneficiario = beneficiarios::create($input);
        $beneficiario = $request->input('funcionario');

        return redirect()->route('beneficiarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(beneficiarios $beneficiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(beneficiarios $beneficiario)
    {
        $funcionario2 = funcionarios::pluck('nom_ape_funcionario', 'nom_ape_funcionario')->all();
        return view('beneficiarios.editar',compact('beneficiario', 'funcionario2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beneficiarios $beneficiario)
    {
         request()->validate([
            'ced_beneficiario' => 'required',
            'nom_beneficiario' => 'required',
            'ape_beneficiario' => 'required',
            'dir_beneficiario' => 'required',
            'gen_beneficiario' => 'required',
            'id_parentesco' => 'required',
            'fec_nac_beneficiario' => 'required',
            'edad_beneficiario' => 'required',
            'tel_beneficiario' => 'required',
            'nom_funcionario' => 'required',
        ]);

        $input = $request->all();
        $beneficiario = beneficiarios::create($input);
        $beneficiario = $request->input('funcionario2');

        return redirect()->route('beneficiarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(beneficiarios $beneficiario)
    {
        $beneficiario->delete();

        return redirect()->route('beneficiarios.index');
    }
}
