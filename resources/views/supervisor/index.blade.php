@extends('layouts.app')
@section('title')
    MyControlSMA-Supervision
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Supervisión</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-supervisor')
                                <a class="btn btn-warning" href="{{ route('supervisor.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">PDF</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Firma Servicio</th>
                                        <th style="color:#fff;">Firma Atencion</th>
                                        <th style="color:#fff;">Firma Auditoria</th>
                                        <th style="color:#fff;">Observaciones</th>
                                        <th style="color:#fff;">acciones</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($supervisores as $supervisor)
                                            <tr>
                                                <td style="display: none;">{{ $supervisor->id }}</td>
                                                <td><a href="{{ asset('/storage/pdf_supervision/' . $supervisor->pdf_fac_supervisor) }}"
                                                        target="_blank">{{ $supervisor->pdf_fac_supervisor }}</a></td>
                                                <td>{{ $supervisor->est_supervisor }}</td>
                                                <td>{{ $supervisor->firma_oserv_supervisor }}</td>
                                                <td>{{ $supervisor->firma_oaten_supervisor }}</td>
                                                <td>{{ $supervisor->firma_aud_supervisor }}</td>
                                                <td>{{ $supervisor->obs_supervisor }}</td>
                                                <td>
                                                    <form action="{{ route('supervisor.destroy', $supervisor->id) }}"
                                                        method="POST">
                                                        @can('editar-supervisor')
                                                            <a class="btn btn-info"
                                                                href="{{ route('supervisor.edit', $supervisor->id) }}">Editar</a>
                                                            <a class="btn btn-secondary" href="">Generar pdf</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-supervisor')
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
