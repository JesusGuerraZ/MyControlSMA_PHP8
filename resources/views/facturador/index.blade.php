@extends('layouts.app')
@section('title')
    MyControlSMA-Facturacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Facturacion</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-facturacion')
                                <a class="btn btn-warning" href="{{ route('facturador.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Numero de orden</th>
                                        <th style="color:#fff;">Fec. Reg. Factura</th>
                                        <th style="color:#fff;">Fec. Factura</th>
                                        <th style="color:#fff;">Valor</th>
                                        <th style="color:#fff;">PDF</th>
                                        <th style="color:#fff;">Aprobada</th>
                                        <th style="color:#fff;">Observaciones</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($facturaciones as $facturadors)
                                            <tr>
                                                <td style="display: none;">{{ $facturadors->id }}</td>
                                                <td>{{ $facturadors->id_oservicio }}</td>
                                                <td>{{ $facturadors->fec_reg_factura }}</td>
                                                <td>{{ $facturadors->fec_factura }}</td>
                                                <td>{{ $facturadors->valor_factura }}</td>
                                                <td><a href="{{ asset('/storage/pdf_facturacion/'.$facturadors->pdf_facturacion)}}" target="_blank">{{ $facturadors->pdf_facturacion }}</a></td>
                                                <td>{{ $facturadors->aprobada_facturacion }}</td>
                                                <td>{{ $facturadors->obs_facturacion }}</td>
                                                <td>
                                                    <form action="{{ route('facturador.destroy', $facturadors->id) }}"
                                                        method="POST">
                                                        @can('editar-facturacion')
                                                            <a class="btn btn-info"
                                                                href="{{ route('facturador.edit', $facturadors->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-facturacion')
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

