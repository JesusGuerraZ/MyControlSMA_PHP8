<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Regional;

class RegionalController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-regional|crear-regional|editar-regional|borrar-regional')->only('index');
         $this->middleware('permission:crear-regional', ['only' => ['create','store']]);
         $this->middleware('permission:editar-regional', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-regional', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
         $regionals = Regional::all();
         return view('regional.index',compact('regionals'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regional.crear');
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
            'nom_regional' => 'required',
            'dir_regional' => 'required',

        ]);

        Regional::create($request->all());

        return redirect()->route('regional.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regional $regional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Regional $regional)
    {
        return view('regional.editar',compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regional $regional)
    {
         request()->validate([
            'nom_regional' => 'required',
            'dir_regional' => 'required',
        ]);

        $regional->update($request->all());

        return redirect()->route('regional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regional $regional)
    {
        $regional->delete();

        return redirect()->route('regional.index');
    }
}
