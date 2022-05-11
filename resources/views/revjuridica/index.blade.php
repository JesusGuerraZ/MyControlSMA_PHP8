@extends('layouts.app')
@section('title')
    MyControlSMA-Revision juridica
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Revision juridica</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-rjuridica')
                                <a class="btn btn-warning" href="{{ route('revjuridica.create') }}">Nuevo</a>
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
                                        @foreach ($rjuridicas as $rjuridica)
                                            <tr>
                                                <td style="display: none;">{{ $rjuridica->id }}</td>
                                                <td>{{ $rjuridica->pdf_fac_rjuridica }}</td>
                                                <td>{{ $rjuridica->pdf_firmas_rjuridica }}</td>
                                                <td>{{ $rjuridica->est_rjuridica }}</td>
                                                <td>{{ $rjuridica->obs_rjuridica }}</td>
                                                <td>
                                                    <form action="{{ route('revjuridica.destroy', $rjuridica->id) }}"
                                                        method="POST">
                                                        @can('editar-rjuridica')
                                                            <a class="btn btn-info"
                                                                href="{{ route('revjuridica.edit', $rjuridica->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-rjuridica')
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

