@extends('layouts.app')
@section('title')
    MyControlSMA-Editar funcionario
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Funcionario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="ced_funcionario">Cédula</label>
                                            <input type="text" name="ced_funcionario" class="form-control" value="{{ $funcionario->ced_funcionario}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">

                                        <div class="form-group">
                                            <label for="nom_ape_funcionario">Nombre y apellido</label>
                                            <input type="text" name="nom_ape_funcionario" class="form-control" value="{{ $funcionario->nom_ape_funcionario}}">

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="tel_funcionario">Teléfono</label>
                                            <input type="text" name="tel_funcionario" class="form-control" value="{{ $funcionario->tel_funcionario}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cel_funcionario">Celular</label>
                                            <input type="text" name="cel_funcionario" class="form-control" value="{{ $funcionario->cel_funcionario}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="nom_regional">Regional</label>
                                            <input type="text" name="nom_regional" class="form-control" value="{{ $funcionario->nom_regional}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <input type="button" class="btn btn-secondary" value="Cancelar" onClick="history.go(-1);">
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
