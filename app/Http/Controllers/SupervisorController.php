<?php

namespace App\Http\Controllers;

use App\Models\supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-supervisor|crear-supervisor|editar-supervisor|borrar-supervisor')->only('index');
        $this->middleware('permission:crear-supervisor', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-supervisor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-supervisor', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $supervisores = supervisor::all();
        return view('supervisor.index', compact('supervisores'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //relacionar campos de distintos modelos y tablas
        $input = $request->all();

        //Variables para guardar e identificar eñ pdf;
        $extension = $request->file('pdf_fac_supervisor')->getClientOriginalExtension();
        $pdfName = $request->file('pdf_fac_supervisor')->getClientOriginalName();
        $id_os = $request->input('id_oservicio');
        $nom_pdf = time() . '_' . $pdfName;
        $input['pdf_fac_supervisor'] = $nom_pdf;

        request()->validate([
            'pdf_fac_supervisor' => 'required',
            'est_supervisor' => 'required',
            'firma_oserv_supervisor' => 'required',
            'firma_oaten_supervisor' => 'required',
            'firma_aud_supervisor' => 'required',
            'obs_supervisor' => 'required',

        ]);

        if ($request->hasFile('pdf_fac_supervisor') &&  $extension == 'pdf') {

            request()->file('pdf_fac_supervisor')->storeAs('public/PDF_supervision', $nom_pdf);
            //dd($input['pdf_fac_supervisor']);
        } else {
            dd('No es un PDF');
        }

        $supervisor = supervisor::create($input);
        return redirect()->route('supervisor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(supervisor $supervisor)
    {
        return view('supervisor.editar', compact('supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supervisor $supervisor)
    {
        request()->validate([
            'pdf_fac_supervisor' => 'required',
            'est_supervisor' => 'required',
            'firma_oserv_supervisor' => 'required',
            'firma_oaten_supervisor' => 'required',
            'firma_aud_supervisor' => 'required',
            'obs_supervisor' => 'required',
        ]);

        $supervisor->update($request->all());

        return redirect()->route('supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(supervisor $supervisor)
    {
        $supervisor->delete();

        return redirect()->route('supervisor.index');
    }
}
