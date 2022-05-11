<?php

namespace App\Http\Controllers;

use App\Models\oservicio;
use Illuminate\Http\Request;
use App\Models\beneficiarios;
use App\Models\contratos;
use Illuminate\Support\Facades\DB;

class OservicioController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-oservicio|crear-oservicio|editar-oservicio|borrar-oservicio')->only('index');
        $this->middleware('permission:crear-oservicio', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-oservicio', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-oservicio', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //sin paginación
        $servicios = oservicio::all();

        return view('oservicios.index', compact('servicios'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $oatenciones->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiario_id = beneficiarios::pluck('ced_beneficiario', 'ced_beneficiario')->all();
        //concatenar columnas
        $fullName_beneficiario = DB::table('beneficiarios')->select('id', DB::raw("CONCAT(beneficiarios.nom_beneficiario,' ',beneficiarios.ape_beneficiario) AS full_name"))->get()->pluck('full_name', 'id');
        //llamar el nombre beneficiario desde la base de datos
        $nomBeneficiario = DB::table('beneficiarios')->get();
        $prestador_nom = contratos::pluck('prest_contrato', 'prest_contrato')->all();
        //obtener el ultimo id para tomarlo como el · de registro para la orden de servicio
        $numReg_oservicio = DB::table('oservicios')->select('id')->get();
        $numReg_oservicioLast = $numReg_oservicio->last();
        $nr = $numReg_oservicio;

        return view('oservicios.crear', compact('beneficiario_id'), compact('prestador_nom', 'fullName_beneficiario', 'nomBeneficiario', 'nr'));
    }
    public function getState(Request $request)
    {
        $cid = $request->post('cid');
        $state = DB::table('beneficiarios')->where('id', $cid)->orderBy('id', 'asc')->get();
        // $html = '<option value="" disabled selected>Documento</option>';
        foreach ($state as $list) {
            $html = '<option value="' . $list->ced_beneficiario . '">' . $list->ced_beneficiario . '</option>';
        }
        echo $html;
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
        //nombre
        $beneficiario_nom =  beneficiarios::select('ced_beneficiario')->get();
        $beneficiario_ape = beneficiarios::pluck('ape_beneficiario', 'ape_beneficiario')->all();


        //Variables para guardar e identificar el pdf;
        $extension = $request->file('pdf_oservicio')->getClientOriginalExtension();
        $pdfName = $request->file('pdf_oservicio')->getClientOriginalName();
        $num_os = $request->input('num_oservicio');
        $nom_pdf = $num_os . '_' . $pdfName;
        $input['pdf_oservicio'] = $nom_pdf;

        request()->validate([
            'fec_reg_oservicio' => 'required',
            'num_oservicio' => 'required',
            'id_beneficiario' => 'required',
            'nom_beneficiario' => 'required',
            'ident_prestador' => 'required',
            'pdf_oservicio' => 'required',

        ]);

        $numReg_oservicio = DB::table('oservicios')->select('id')->get();
        $numReg_oservicioLast = $numReg_oservicio->last();
        $h = oservicio::pluck('id')->all()->last();
        $nr = $numReg_oservicio;

        if ($request->hasFile('pdf_oservicio') &&  $extension == 'pdf') {
            dd($h);
            request()->file('pdf_oservicio')->storeAs('public/PDF_oservicio', $nom_pdf);
            //dd($input['pdf_oservicio']);
            //dd($orden_servicio);
        } else {
                //dd('No es un PDF');

            ;
        }
        //request()->file('pdf_oservicio')->store('public');
        $oservicio = oservicio::create($input);
        $oservicio = $request->input('beneficiario_id');
        $oservicio = $request->input('nr');
        $oservicio = $request->input('prestador_nom');


        return redirect()->route('oservicios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function preView($id)
    {
    }

    public function show(oservicio $oservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(oservicio $oservicio)
    {
        return view('oservicios.editar', compact('oservicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oservicio $oservicio)
    {
        request()->validate([
            'fec_reg_oservicio' => 'required',
            'num_oservicio' => 'required',
            'id_beneficiario' => 'required',
            'ident_prestador' => 'required',
            'fec_cita_oservicio' => 'required',
            'pdf_oservicio' => 'required',
        ]);


        $oservicio->update($request->all());

        return redirect()->route('oservicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(oservicio $oservicio)
    {
        $oservicio->delete();

        return redirect()->route('oservicios.index');
    }
}
