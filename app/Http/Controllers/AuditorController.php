<?php

namespace App\Http\Controllers;

use App\Models\auditor;
use App\Models\oservicio;
use App\Models\oatencion;
use App\Models\facturador;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Storage;


class AuditorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-auditoria|crear-auditoria|editar-auditoria|borrar-auditoria')->only('index');
        $this->middleware('permission:crear-auditoria', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-auditoria', ['only' => ['edit', 'update']]);
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
        $facturadores = facturador::all();
        $auditores = auditor::all();
        $oservicios = oservicio::all();
        $datos = DB::select("SELECT OS.id, OS.num_oservicio, OS.ident_prestador, pdf_oservicio, pdf_facturacion FROM oservicios OS, facturadors FA WHERE OS.num_oservicio = FA.id_oservicio;");
        dd($datos);

        return view('auditor.index', compact('auditores', 'oservicios', 'facturadores', 'datos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(oservicio $oservicio)
    {

        /* Storage::copy('public/PDF_oservicio/'.$pdf, 'public/PDF_auditoriaAprobada/'.$pdf); */
        return redirect()->route('auditor.index');
    }

    //metodo para aprobar y copyr un PDf
    public function aprobar($num_oservicio)
    {
        //se generan las consultas para conseguir el nombre del pdf el cual esta guardado en la base de datos
        $pdfOservicio = oservicio::select("pdf_oservicio")->where('num_oservicio', $num_oservicio)->pluck('pdf_oservicio')->all();
        $pdfFacturacion = facturador::select("pdf_facturacion")->where('id_oservicio', $num_oservicio)->pluck('pdf_facturacion')->all();
        //como nos devuelve el array con un solo valor cada uno lo seleccionamos eligiendo la posicion 0 del array
        //ruta origen
        $pdfOservicio_path = 'public/PDF_oservicio/' . $pdfOservicio[0];
        //ruta destino
        $pdfAprobacionServicio_path = 'public/PDF_auditoriaAprobada/PDF_OservicioAprobada/' . $pdfOservicio[0];
        //realizamos lo mismo que en las lineas anteriores pero para el modelo facturacion en vez de servicios
        //ruta origen
        $pdfFacturacion_path = 'public/PDF_facturacion/' . $pdfFacturacion[0];
        //ruta destino
        $pdfAprobacionFacturacion_path = 'public/PDF_auditoriaAprobada/PDF_FacturacionAprobada/' . $pdfFacturacion[0];
        //dd($pdfAprobacionServicio_path, $pdfAprobacionFacturacion_path);

        //usamos storage::copy le damos la ruta origen y la ruta destino en este respectivo orden
        //if (file_exists($pdfOservicio_path) && file_exists($pdfFacturacion_path)) {
        Storage::copy($pdfOservicio_path, $pdfAprobacionServicio_path);
        Storage::copy($pdfFacturacion_path, $pdfAprobacionFacturacion_path);
        return redirect()->route('auditor.index');
        //}

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
        return view('auditor.editar', compact('auditor'));
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
     * Recopy the specified resource from storage.
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
