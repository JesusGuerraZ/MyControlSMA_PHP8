@extends('layouts.app')
@section('title')
    MyControlSMA-Validacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Validador</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-validador')
                                <a class="btn btn-warning" href="{{ route('validador.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">PDF Factura</th>
                                        <th style="color:#fff;">PDF Firmas</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Observaciones</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($validadores as $validador)
                                            <tr>
                                                <td style="display: none;">{{ $validador->id }}</td>
                                                <td><a href="{{ asset('/storage/pdf_facValidador/'.$validador->pdf_fac_validador)}}" target="_blank">{{ $validador->pdf_fac_validador }}</a></td>
                                                <td><a href="{{ asset('/storage/pdf_firmas/'.$validador->pdf_firmas_validador)}}" target="_blank">{{ $validador->pdf_firmas_validador }}</a></td>
                                                <td>{{ $validador->est_validador }}</td>
                                                <td>{{ $validador->obs_validador }}</td>
                                                <td>
                                                    <form action="{{ route('validador.destroy', $validador->id) }}"
                                                        method="POST">
                                                        @can('editar-validador')
                                                            <a class="btn btn-info"
                                                                href="{{ route('validador.edit', $validador->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-validador')
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

