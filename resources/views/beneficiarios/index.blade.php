@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Beneficiarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-beneficiario')
                                <a class="btn btn-warning" href="{{ route('beneficiarios.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Documento</th>
                                        <th style="color:#fff;">Nombre</th>
                                        <th style="color:#fff;">Apellido</th>
                                        <th style="color:#fff;">Direccion</th>
                                        <th style="color:#fff;">Genero</th>
                                        <th style="color:#fff;">Parentesco</th>
                                        <th style="color:#fff;">Fec. Nacimiento</th>
                                        <th style="color:#fff;">Edad</th>
                                        <th style="color:#fff;">Telefono</th>
                                        <th style="color:#fff;">Funcionario</th>
                                        <th style="color:#fff;">acciones</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($beneficiarios as $beneficiario)
                                            <tr>
                                                <td style="display: none;">{{ $beneficiario->id }}</td>
                                                <td>{{ $beneficiario->ced_beneficiario }}</td>
                                                <td>{{ $beneficiario->nom_beneficiario }}</td>
                                                <td>{{ $beneficiario->ape_beneficiario }}</td>
                                                <td>{{ $beneficiario->dir_beneficiario }}</td>
                                                <td>{{ $beneficiario->gen_beneficiario }}</td>
                                                <td>{{ $beneficiario->id_parentesco }}</td>
                                                <td>{{ $beneficiario->fec_nac_beneficiario }}</td>
                                                <td>{{ $beneficiario->edad_beneficiario }}</td>
                                                <td>{{ $beneficiario->tel_beneficiario }}</td>
                                                <td>{{ $beneficiario->nom_funcionario }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('beneficiarios.destroy', $beneficiario->id) }}"
                                                        method="POST">
                                                        @can('editar-beneficiario')
                                                            <a class="btn btn-info"
                                                                href="{{ route('beneficiarios.edit', $beneficiario->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-beneficiario')
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
