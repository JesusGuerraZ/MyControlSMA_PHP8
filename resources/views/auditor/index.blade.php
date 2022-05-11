@extends('layouts.app')
@section('title')
    MyControlSMA-Auditoria
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Auditoria médica</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-auditoria')
                                <a class="btn btn-warning" href="{{ route('auditor.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Servicio</th>
                                        <th style="color:#fff;">Factura id</th>
                                        <th style="color:#fff;">Aprobada</th>
                                        <th style="color:#fff;">Fec. de aprobacion</th>
                                        <th style="color:#fff;">Observaciones</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($auditores as $auditors)
                                            <tr>
                                                <td style="display: none;">{{ $auditors->id }}</td>
                                                <td>{{ $auditors->id_oservicio }}</td>
                                                <td>{{ $auditors->id_facturacion }}</td>
                                                <td>{{ $auditors->aprobada_auditoria }}</td>
                                                <td>{{ $auditors->fec_apr_auditoria }}</td>
                                                <td>{{ $auditors->obs_auditoria }}</td>
                                                <td>
                                                    <form action="{{ route('auditor.destroy', $auditors->id) }}"
                                                        method="POST">
                                                        @can('editar-auditoria')
                                                            <a class="btn btn-info"
                                                                href="{{ route('auditor.edit', $auditors->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-auditoria')
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
