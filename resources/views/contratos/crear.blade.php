@extends('layouts.app')
@section('title')
    MyControlSMA-Crear contrato
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Contrato</h3>
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

                            <form action="{{ route('contratos.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="num_contrato">Numero</label>
                                            <input type="text" name="num_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="obj_contrato	">Objeto</label>
                                            <input type="text" name="obj_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prest_contrato">Prestador</label>
                                            <input type="text" name="prest_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="ident_contrato">Identificacion prestador </label>
                                            <input type="number" name="ident_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_contrato">Tipo de contratacion</label>
                                            <select name="tipo_contrato" id="" class="form-control">
                                                <option value="Contratacion directa">Contratacion directa</option>
                                                <option value="Selección Abreviada de Menor Cuantía">Selección Abreviada de
                                                    Menor Cuantía</option>
                                                <option value="Mínima Cuantía">Mínima Cuantía</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="servi_contrato">Servicio</label>
                                            <select name="servi_contrato" id="" class="form-control">
                                                <option value="Infectología">Infectología</option>
                                                <option value="Laboratorio clínico">Laboratorio clínico</option>
                                                <option value="Odontología">Odontología</option>
                                                <option value="Oxígeno domiciliario">Oxígeno domiciliario</option>
                                                <option value="Ortopedia y traumatología">Ortopedia y traumatología</option>
                                                <option value="Cardiología">Cardiología</option>
                                                <option value="Imágenes diagnósticas">Imágenes diagnósticas</option>
                                                <option value="Psiquiatría">Psiquiatría</option>
                                                <option value="Clínica">Clínica</option>
                                                <option value="Endocrinología">Endocrinología</option>
                                                <option value="Psicología">Psicología</option>
                                                <option value="Fisioterapia">Fisioterapia</option>
                                                <option value="Medicina interna">Medicina interna</option>
                                                <option value="Alergología">Alergología</option>
                                                <option value="Dermatología">Dermatología</option>
                                                <option value="Pediatría">Pediatría</option>
                                                <option value="Reumatología">Reumatología</option>
                                                <option value="Ginecología">Ginecología</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_susc_contrato">Fec. de suscripción</label>
                                            <input type="date" name="fec_susc_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_ini_contrato">Fec. de inicio</label>
                                            <input type="date" name="fec_ini_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="fec_ter_contrato">Fec. de finalizacion</label>
                                            <input type="date" name="fec_ter_contrato" class="form-control">
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
                                            <label for="val_contrato">Valor inicial </label>
                                            <input type="number" id="ini_val" name="val_contrato" class="form-control"
                                                oninput="calcular()">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="reg_contrato">Registro presupuestal</label>
                                            <input type="number" name="reg_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_reg_contrato">Fec. de registro</label>
                                            <input type="date" name="fecha_reg_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="mod_contrato">Adición</label>
                                            <select type="text" class="form-control" name="mod_contrato" id="mod_contrato"
                                                onchange="boolean_validation()">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="val_mod_contrato">Valor adición</label>
                                            <input type="number" id="mod_val" name="val_mod_contrato" class="form-control"
                                                oninput="calcular()" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="val_act_contrato">Valor actual</label>
                                            <input type="number" id="act_val" name="val_act_contrato"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="obli_contrato">Obligaciones</label>
                                            <input type="text" name="obli_contrato" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="natu_contrato">Naturaleza del prestador</label>
                                            <select type="text" class="form-control" name="natu_contrato"
                                                id="natu_contrato">
                                                <option value="Persona natural">Persona natural</option>
                                                <option value="Juridica">Juridica</option>
                                            </select>
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
                                        <input type="button" class="btn btn-secondary" value="Cancelar"
                                            onClick="history.go(-1);">
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
