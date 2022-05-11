<?php

namespace App\Http\Controllers;

use App\Models\validador;
use Illuminate\Http\Request;

class ValidadorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-validador|crear-validador|editar-validador|borrar-validador')->only('index');
         $this->middleware('permission:crear-validador', ['only' => ['create','store']]);
         $this->middleware('permission:editar-validador', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-validador', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
         $validadores = validador::all();
         return view('validador.index',compact('validadores'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('validador.crear');
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
        $extension = $request->file('pdf_fac_validador')->getClientOriginalExtension();
        $pdfName = $request->file('pdf_fac_validador')->getClientOriginalName();
        //$id_os = $request->input('id_oservicio');
        $nom_pdf = time() . '_' . $pdfName;
        $input['pdf_fac_validador'] = $nom_pdf;
        //
        $extension2 = $request->file('pdf_firmas_validador')->getClientOriginalExtension();
        $pdfName2 = $request->file('pdf_firmas_validador')->getClientOriginalName();
        //$id_os2 = $request->input('id_oservicio');
        $nom_pdf2 = time() . '_' . $pdfName2;
        $input['pdf_firmas_validador'] = $nom_pdf2;

        request()->validate([
            'pdf_fac_validador' => 'required',
            'pdf_firmas_validador' => 'required',
            'est_validador' => 'required',
            'obs_validador' => 'required',
        ]);

        if ($request->hasFile('pdf_fac_validador') && $request->hasFile('pdf_firmas_validador') &&  $extension == 'pdf' &&  $extension2 == 'pdf') {

            request()->file('pdf_fac_validador')->storeAs('public/PDF_facValidador', $nom_pdf);
            request()->file('pdf_firmas_validador')->storeAs('public/PDF_firmas', $nom_pdf2);

        } else {
            dd('No es un PDF');
        }


        $validador = validador::create($input);
        return redirect()->route('validador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(validador $validador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(validador $validador)
    {
        return view('validador.editar',compact('validador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, validador $validador)
    {
         request()->validate([
            'pdf_fac_validador' => 'required',
            'pdf_firmas_validador' => 'required',
            'est_validador' => 'required',
            'obs_validador' => 'required',
        ]);

        $validador->update($request->all());

        return redirect()->route('validador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(validador $validador)
    {
        $validador->delete();

        return redirect()->route('validador.index');
    }
}
