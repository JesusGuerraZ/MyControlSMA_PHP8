@extends('layouts.app')
@section('title')
    MyControlSMA-Editar servicio
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar orden de servicio</h3>
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


                            <form action="{{ route('oservicios.update', $oservicio->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-4">
                                        <div class="form-group">
                                            <label for="fec_reg_oservicio">Fecha registro</label>
                                            <input type="date" name="fec_reg_oservicio" class="form-control" value="{{ $oservicio->fec_reg_oservicio }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">

                                        <div class="form-group">
                                            <label for="num_oservicio"> Número orden de servicio</label>
                                            <input type="number" name="num_oservicio" class="form-control" value="{{ $oservicio->num_oservicio }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="id_beneficiario">ID del beneficiario</label>
                                            <input type="text" name="id_beneficiario" class="form-control" value="{{ $oservicio->id_beneficiario }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="ident_prestador">ID del prestador</label>
                                            <input type="text" name="ident_prestador" class="form-control" value="{{ $oservicio->ident_prestador }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-4">
                                        <div class="form-group">
                                            <label for="fecha de la cita ">Fecha de la cita</label>
                                            <input type="date" name="fec_cita_oservicio" class="form-control" value="{{ $oservicio->fec_cita_oservicio }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="est_oservicio">Estado</label>
                                            <select name="est_oservicio" id="est_oservicio" for="est_oservicio"
                                                class="form-control">
                                                <option value="no atendida">No atendida</option>
                                                <option value="atendida">atendida</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="pdf_oservicio">PDF</label><br>
                                            <input type="file" name="pdf_oservicio" class="">
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
