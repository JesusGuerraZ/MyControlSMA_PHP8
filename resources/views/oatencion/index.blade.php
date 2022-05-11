@extends('layouts.app')
@section('title')
    MyControlSMA-Atencion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ordenes de atencion</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-oatencion')
                                <a class="btn btn-warning" href="{{ route('oatencion.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Servicio</th>
                                        <th style="color:#fff;">Fecha de atención</th>
                                        <th style="color:#fff;">Número</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">PDF</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($oatenciones as $oatencions)
                                            <tr>
                                                <td style="display: none;">{{ $oatencions->id }}</td>
                                                <td>{{ $oatencions->id_oservicio }}</td>
                                                <td>{{ $oatencions->fec_oatencion }}</td>
                                                <td>{{ $oatencions->num_oatencion }}</td>
                                                <td>{{ $oatencions->est_oatencion }}</td>
                                                <td><a href="{{ asset('/storage/pdf_oatencion/'.$oatencions->pdf_oatencion)}}" target="_blank">{{ $oatencions->pdf_oatencion }}</a></td>
                                                <td>
                                                    <form action="{{ route('oatencion.destroy', $oatencions->id) }}"
                                                        method="POST">
                                                        @can('editar-oatencion')
                                                            <a class="btn btn-info"
                                                                href="{{ route('oatencion.edit', $oatencions->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-oatencion')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

