<?php

namespace App\Http\Controllers;


use App\Models\facturador;
use Illuminate\Http\Request;
use App\Models\oservicio;


class FacturadorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-facturacion|crear-facturacion|editar-facturacion|borrar-facturacion')->only('index');
        $this->middleware('permission:crear-facturacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-facturacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-facturacion', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $facturaciones = facturador::all();
        return view('facturador.index', compact('facturaciones'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = oservicio::where('est_oservicio', '=', 'atendida')->get();
        $orden_servicio = $consulta->pluck('num_oservicio', 'num_oservicio')->all();



        return view('facturador.crear', compact('orden_servicio'));
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
        $extension = $request->file('pdf_facturacion')->getClientOriginalExtension();
        $pdfName = $request->file('pdf_facturacion')->getClientOriginalName();
        $id_os = $request->input('id_oservicio');
        $nom_pdf = $id_os . '_' . $pdfName;
        $input['pdf_facturacion'] = $nom_pdf;

        request()->validate([
            'id_oservicio' => 'required',
            'fec_reg_factura' => 'required',
            'fec_factura' => 'required',
            'valor_factura' => 'required',
            'pdf_facturacion' => 'required',
            'aprobada_facturacion' => 'required',
            'obs_facturacion' => 'required',


            //'contenido' => 'required',
        ]);

        if ($request->hasFile('pdf_facturacion') &&  $extension == 'pdf') {

            request()->file('pdf_facturacion')->storeAs('public/PDF_facturacion', $nom_pdf);

        } else {
            dd('No es un PDF');
        }

        $facturador = facturador::create($input);
        $facturador = $request->input('orden_servicio');

        return redirect()->route('facturador.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(facturador $facturador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(facturador $facturador)
    {
        return view('facturador.editar', compact('facturador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facturador $facturador)
    {
        request()->validate([
            'id_oservicio' => 'required',
            'fec_reg_factura' => 'required',
            'fec_factura' => 'required',
            'valor_factura' => 'required',
            'pdf_facturacion' => 'required',
            'aprobada_facturacion' => 'required',
            'obs_facturacion' => 'required',

        ]);

        $facturador->update($request->all());

        return redirect()->route('facturador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(facturador $facturador)
    {
        $facturador->delete();

        return redirect()->route('facturador.index');
    }
}
