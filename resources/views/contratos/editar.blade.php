@extends('layouts.app')
@section('title')
    MyControlSMA-Editar contrato
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar contrato</h3>
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


                            <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="num_contrato">Numero</label>
                                            <input type="text" name="num_contrato" class="form-control" value="{{ $contrato->num_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="obj_contrato	">Objeto</label>
                                            <input type="text" name="obj_contrato" class="form-control" value="{{ $contrato->obj_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prest_contrato">Prestador</label>
                                            <input type="text" name="prest_contrato" class="form-control" value="{{ $contrato->prest_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="ident_contrato">Identificacion prestador </label>
                                            <input type="number" name="ident_contrato" class="form-control" value="{{ $contrato->ident_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_contrato">Tipo de contratacion</label>
                                            <input type="text" name="tipo_contrato" class="form-control" value="{{ $contrato->tipo_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="servi_contrato">Servicio</label>
                                            <input type="text" name="servi_contrato" class="form-control" value="{{ $contrato->servi_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_susc_contrato">Fec. de suscripción</label>
                                            <input type="date" name="fec_susc_contrato" class="form-control" value="{{ $contrato->fec_susc_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_ini_contrato">Fec. de inicio</label>
                                            <input type="date" name="fec_ini_contrato" class="form-control" value="{{ $contrato->fec_ini_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_ter_contrato">Fec. de finalizacion</label>
                                            <input type="date" name="fec_ter_contrato" class="form-control" value="{{ $contrato->fec_ter_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="vig_contrato">Vigencia futura</label>
                                            <select type="text" class="form-control" name="vig_contrato"
                                                id="vig_contrato">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="val_contrato">Valor inicial</label>
                                            <input type="number" name="val_contrato" class="form-control" value="{{ $contrato->val_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="reg_contrato">Registro presupuestal</label>
                                            <input type="number" name="reg_contrato" class="form-control" value="{{ $contrato->reg_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_reg_contrato">Fec. de registro</label>
                                            <input type="date" name="fecha_reg_contrato" class="form-control" value="{{ $contrato->fecha_reg_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="mod_contrato">Adición</label>
                                            <select type="text" class="form-control" name="mod_contrato"
                                                id="mod_contrato" onchange="boolean_validation()">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="val_mod_contrato">Valor adición</label>
                                            <input type="number" id="mod_val" name="val_mod_contrato" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="val_act_contrato">Valor actual</label>
                                            <input type="number" name="val_act_contrato" class="form-control" value="{{ $contrato->val_act_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="obli_contrato">Obligaciones</label>
                                            <input type="text" name="obli_contrato" class="form-control" value="{{ $contrato->obli_contrato}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <div class="form-group">
                                            <label for="est_contrato">Estado</label><br>
                                            <select type="number" class="form-control" name="est_contrato"
                                                id="est_contrato">
                                                <option value="Inactivo">Inactivo</option>
                                                <option value="Activo">Activo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <input type="button" class="btn btn-secondary" value="Cancelar" onClick="history.go(-1);">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
