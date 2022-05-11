<?php

namespace App\Http\Controllers;

use App\Models\auditor;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-auditoria|crear-auditoria|editar-auditoria|borrar-auditoria')->only('index');
         $this->middleware('permission:crear-auditoria', ['only' => ['create','store']]);
         $this->middleware('permission:editar-auditoria', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-auditoria', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Sin paginación
         $auditores = auditor::all();
         return view('auditor.index',compact('auditores'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auditor.crear');
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
            'id_oservicio' => 'required',
            'id_facturacion' => 'required',
            'aprobada_auditoria' => 'required',
            'fec_apr_auditoria' => 'required',
            'obs_auditoria' => 'required',
        ]);

        auditor::create($request->all());

        return redirect()->route('auditor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(auditor $auditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(auditor $auditor)
    {
        return view('auditor.editar',compact('auditor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, auditor $auditor)
    {
         request()->validate([
            'id_oservicio' => 'required',
            'id_facturacion' => 'required',
            'aprobada_auditoria' => 'required',
            'fec_apr_auditoria' => 'required',
            'obs_auditoria' => 'required',
        ]);

        $auditor->update($request->all());

        return redirect()->route('auditor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(auditor $auditor)
    {
        $auditor->delete();

        return redirect()->route('auditor.index');
    }
}
