@extends('layouts.app')
@section('title')
    MyControlSMA-Servicio
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ordenes de servicios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-oservicio')
                                <a class="btn btn-warning" href="{{ route('oservicios.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Fecha de Registro</th>
                                        <th style="color:#fff;">Número</th>
                                        <th style="color:#fff;">Beneficiario</th>
                                        <th style="color:#fff;">Prestador</th>
                                        <th style="display: none;">Fec de Cita</th>
                                        <th style="color:#fff;">PDF</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Valor</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($servicios as $oservicios)
                                            <tr>
                                                <td style="display: none;">{{ $oservicios->id }}</td>
                                                <td>{{ $oservicios->fec_reg_oservicio }}</td>
                                                <td>{{ $oservicios->num_oservicio }}</td>
                                                <td>{{ $oservicios->id_beneficiario }}</td>
                                                <td>{{ $oservicios->ident_prestador }}</td>
                                                <td style="display: none;">{{ $oservicios->fec_cita_oservicio }}</td>
                                                <td><a href="{{ asset('/storage/pdf_oservicio/' . $oservicios->pdf_oservicio) }}"
                                                        target="_blank">{{ $oservicios->pdf_oservicio }}</a></td>
                                                <td>{{ $oservicios->est_oservicio }}</td>
                                                <td>{{ $oservicios->val_oservicio }}</td>
                                                <td>
                                                    <form action="{{ route('oservicios.destroy', $oservicios->id) }}"
                                                        method="POST">
                                                        @can('editar-oservicio')
                                                            <a class="btn btn-info"
                                                                href="{{ route('oservicios.edit', $oservicios->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-oservicio')
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
        </div>
    </section>
@endsection
