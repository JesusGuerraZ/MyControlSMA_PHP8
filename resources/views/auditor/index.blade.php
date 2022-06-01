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
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Número de orden</th>
                                        <th style="color:#fff;">Prestador</th>
                                        <th style="color:#fff;">PDF Ord. Atencion</th>
                                        <th style="color:#fff;">PDF Facturacion</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($datos as $list)
                                            <tr>
                                                <td style="display: none;">{{ $list->num_oservicio }}</td>
                                                <td>{{ $list->id }}</td>
                                                <td>{{ $list->ident_prestador }}</td>
                                                <td><a href="{{ asset('/storage/pdf_oservicio/' . $list->pdf_oservicio) }}"
                                                        target="_blank">{{ $list->pdf_oservicio }}</td>
                                                <td><a href="{{ asset('/storage/pdf_facturacion/' . $list->pdf_facturacion) }}"
                                                        target="_blank">{{ $list->pdf_facturacion }}</td>
                                                {{-- <td>{{ $list->obs_auditoria }}</td> --}}
                                                <td>
                                                    <form action="{{ route('auditor.destroy', $list->id) }}"
                                                        method="POST">
                                                        @can('crear-auditoria')
                                                            <a class="btn btn-warning"
                                                                href="{{ route('oservicioPDF.aprobado', $list->num_oservicio) }}">Aprobado</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-auditoria')
                                                            <button type="submit" class="btn btn-danger">Desaprobado</button>
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
