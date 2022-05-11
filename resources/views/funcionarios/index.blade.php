@extends('layouts.app')
@section('title')
    MyControlSMA-Funcionarios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Funcionarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-regional')
                                <a class="btn btn-warning" href="{{ route('funcionarios.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Cedula</th>
                                        <th style="color:#fff;">Funcionario</th>
                                        <th style="color:#fff;">Telefono</th>
                                        <th style="color:#fff;">Celular</th>
                                        <th style="color:#fff;">Regional</th>
                                        <th style="color:#fff;">acciones</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($funcionarios as $funcionario)
                                            <tr>
                                                <td style="display: none;">{{ $funcionario->id }}</td>
                                                <td>{{ $funcionario->ced_funcionario }}</td>
                                                <td>{{ $funcionario->nom_ape_funcionario }}</td>
                                                <td>{{ $funcionario->tel_funcionario }}</td>
                                                <td>{{ $funcionario->cel_funcionario }}</td>
                                                <td>{{ $funcionario->nom_regional }}</td>
                                                <td>
                                                    <form action="{{ route('funcionarios.destroy', $funcionario->id) }}"
                                                        method="POST">
                                                        @can('editar-funcionarios')
                                                            <a class="btn btn-info"
                                                                href="{{ route('funcionarios.edit', $funcionario->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-funcionarios')
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
