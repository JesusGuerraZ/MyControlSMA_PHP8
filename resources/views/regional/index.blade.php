@extends('layouts.app')
@section('title')
    MyControlSMA-Regional
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Regionales</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-regional')
                                <a class="btn btn-warning" href="{{ route('regional.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive"><br>
                                <table class="table table-striped mt-2" id="dataTable">
                                    <thead style="background-color:#575756">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Regional</th>
                                        <th style="color:#fff;">Dir. Regional</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($regionals as $regional)
                                            <tr>
                                                <td style="display: none;">{{ $regional->id }}</td>
                                                <td>{{ $regional->nom_regional }}</td>
                                                <td>{{ $regional->dir_regional }}</td>
                                                <td>
                                                    <form action="{{ route('regional.destroy', $regional->id) }}"
                                                        method="POST">
                                                        @can('editar-regional')
                                                            <a class="btn btn-info"
                                                                href="{{ route('regional.edit', $regional->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-regional')
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
