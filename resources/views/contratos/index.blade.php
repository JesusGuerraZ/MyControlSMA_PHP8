@extends('layouts.app')
@section('title')
    MyControlSMA-Contratos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contratos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-contrato')
                                <a class="btn btn-warning" href="{{ route('contratos.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Numero</th>
                                        <th style="color:#fff;">Objeto</th>
                                        <th style="color:#fff;">Prestador</th>
                                        <th style="color:#fff;">Id.Prestador</th>
                                        <th style="color:#fff;">Tipo</th>
                                        <th style="color:#fff;">Servicio</th>
                                        <th style="color:#fff;">Fec.Suscripcion</th>
                                        <th style="color:#fff;">Fec.Inicio</th>
                                        <th style="color:#fff;">Fer.Finalizacion</th>
                                        <th style="color:#fff;">Vigencia futura</th>
                                        <th style="color:#fff;">Valor inicial</th>
                                        <th style="color:#fff;">Registro presupuestal</th>
                                        <th style="color:#fff;">Fec.Registro presupuestal</th>
                                        <th style="color:#fff;">Modificacion</th>
                                        <th style="color:#fff;">Valor modificado</th>
                                        <th style="color:#fff;">Valor Actual</th>
                                        <th style="color:#fff;">Obligacion</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Naturaleza del contrato</th>
                                        <th style="color:#fff;">acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($contrato as $contratos)
                                            <tr>
                                                <td style="display: none;">{{ $contratos->id }}</td>
                                                <td>{{ $contratos->num_contrato }}</td>
                                                <td>{{ $contratos->obj_contrato }}</td>
                                                <td>{{ $contratos->prest_contrato }}</td>
                                                <td>{{ $contratos->ident_contrato }}</td>
                                                <td>{{ $contratos->tipo_contrato }}</td>
                                                <td>{{ $contratos->servi_contrato }}</td>
                                                <td>{{ $contratos->fec_susc_contrato }}</td>
                                                <td>{{ $contratos->fec_ini_contrato }}</td>
                                                <td>{{ $contratos->fec_ter_contrato }}</td>
                                                <td>{{ $contratos->vig_contrato }}</td>
                                                <td>{{ $contratos->val_contrato }}</td>
                                                <td>{{ $contratos->reg_contrato }}</td>
                                                <td>{{ $contratos->fecha_reg_contrato }}</td>
                                                <td>{{ $contratos->mod_contrato }}</td>
                                                <td>{{ $contratos->val_mod_contrato }}</td>
                                                <td>{{ $contratos->val_act_contrato }}</td>
                                                <td>{{ $contratos->obli_contrato }}</td>
                                                <td>{{ $contratos->est_contrato }}</td>
                                                <td>{{ $contratos->natu_contrato }}</td>
                                                <td>
                                                    <form action="{{ route('contratos.destroy', $contratos->id) }}"
                                                        method="POST">
                                                        @can('editar-contrato')
                                                            <a class="btn btn-info"
                                                                href="{{ route('contratos.edit', $contratos->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-contrato')
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
