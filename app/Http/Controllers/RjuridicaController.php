<?php

namespace App\Http\Controllers;

use App\Models\rjuridica;
use Illuminate\Http\Request;

class RjuridicaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-rjuridica|crear-rjuridica|editar-rjuridica|borrar-rjuridica')->only('index');
         $this->middleware('permission:crear-rjuridica', ['only' => ['create','store']]);
         $this->middleware('permission:editar-rjuridica', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-rjuridica', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
         $rjuridicas = rjuridica::all();
         return view('revjuridica.index',compact('rjuridicas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revjuridica.crear');
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
            'pdf_fac_rjuridica' => 'required',
            'pdf_firmas_rjuridica' => 'required',
            'est_rjuridica' => 'required',
            'obs_rjuridica' => 'required',

        ]);

        rjuridica::create($request->all());

        return redirect()->route('revjuridica.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(rjuridica $rjuridica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(rjuridica $revjuridica)
    {
        return view('revjuridica.editar',compact('revjuridica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rjuridica $revjuridica)
    {
         request()->validate([
            'pdf_fac_rjuridica' => 'required',
            'pdf_firmas_rjuridica' => 'required',
            'est_rjuridica' => 'required',
            'obs_rjuridica' => 'required',
        ]);

        $revjuridica->update($request->all());

        return redirect()->route('revjuridica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(rjuridica $revjuridica)
    {
        $revjuridica->delete();

        return redirect()->route('revjuridica.index');
    }
}
