<?php

namespace App\Http\Controllers;

use App\Models\oatencion;
use App\Models\oservicio;
use Illuminate\Http\Request;

class OatencionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-oatencion|crear-oatencion|editar-oatencion|borrar-oatencion')->only('index');
        $this->middleware('permission:crear-oatencion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-oatencion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-oatencion', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $oatenciones = oatencion::all();
        return view('oatencion.index', compact('oatenciones'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $oatenciones->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $consulta = oservicio::where('est_oservicio', '=', 'no atendida')->get();
        $orden_servicio = $consulta->pluck('num_oservicio', 'num_oservicio')->all();

        return view('oatencion.crear', compact('orden_servicio'));
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
        $extension = $request->file('pdf_oatencion')->getClientOriginalExtension();
        $pdfName = $request->file('pdf_oatencion')->getClientOriginalName();
        $num_oa = $request->input('num_oatencion');
        $nom_pdf = $num_oa . '_' . $pdfName;
        $input['pdf_oatencion'] = $nom_pdf;

        //variables para actualizar el estado de la orden de servicio
        $estado_oservicio = $request->input('est_oatencion');
        $num_orden = $request->input('id_oservicio');

        request()->validate([
            'id_oservicio' => 'required',
            'fec_oatencion' => 'required',
            'num_oatencion' => 'required',
            'est_oatencion' => 'required',
            'pdf_oatencion' => 'required',

        ]);

        if ($request->hasFile('pdf_oatencion') &&  $extension == 'pdf') {
            request()->file('pdf_oatencion')->storeAs('public/PDF_oatencion', $nom_pdf);
            //dd($input['pdf_oservicio']);
            //dd($orden_servicio);
        } else {
            dd('No es un PDF');
        }
        //actualizamos el estado de la orden de servicio('atendida') siempre y cuando la orden no sea anulada
        if ($estado_oservicio == 'Orden anulada') {
            //hay que agregar un mensage para cuando si sea anulada
            
        } else {
            oservicio::where('num_oservicio', $num_orden)->update(['est_oservicio' => 'atendida']);
        }


        $oatencion = oatencion::create($input);
        $oatencion = $request->input('orden_servicio');

        return redirect()->route('oatencion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(oatencion $oatencion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(oatencion $oatencion)
    {
        return view('oatencion.editar', compact('oatencion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oatencion $oatencion)
    {
        request()->validate([
            'id_oservicio' => 'required',
            'fec_oatencion' => 'required',
            'num_oatencion' => 'required',
            'est_oatencion' => 'required',
            'pdf_oatencion' => 'required',
        ]);

        $oatencion->update($request->all());

        return redirect()->route('oatencion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(oatencion $oatencion)
    {
        $oatencion->delete();

        return redirect()->route('oatencion.index');
    }
}
