@extends('layouts.app')
@section('title')
    MyControlSMA-Crear servicio
@endsection
@section('content')
    <!--Formulario byron porque es timido-->
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear orden de servicio</h3>
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

                            <form action="{{ route('oservicios.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group"><br>
                                            <label for="numreg_oservicio"><h6>Número de registro</h6></label><br>
                                            {!! Form::select('numreg_oservicio', $nr, [], ['class' => 'form-control', 'id' => 'hola', 'disabled']) !!}
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-6">
                                        <div class="form-group">
                                            <label for="fec_reg_oservicio">Fecha registro</label>
                                            <?php $fcha = date('Y-m-d'); ?>
                                            <input type="date" name="fec_reg_oservicio" class="form-control"
                                                value="<?php echo $fcha; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="num_oservicio"> Número orden de servicio</label>
                                            <input type="number" name="num_oservicio" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Nombre beneficiario</label>
                                            <select id="country" class="form-control" name="nom_beneficiario">
                                                <option disabled selected>Beneficiarios</option>
                                                @foreach ($nomBeneficiario as $list)
                                                    <option value="{{ $list->id }}">
                                                        {{ $list->nom_beneficiario . ' ' . $list->ape_beneficiario }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">ID del beneficiario</label>
                                            <select id="state" class="form-control" name="id_beneficiario">
                                            </select>
                                        </div>

                                        <div class="form-group"><br>
                                            <label for="pdf_oservicio">PDF</label><br>
                                            <input type="file" name="pdf_oservicio" class="">
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-6">
                                        <div class="form-group">
                                            <label for="">Prestador</label>
                                            {!! Form::select('ident_prestador', $prestador_nom, [], ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="">Estado</label>
                                            <select name="est_oservicio" id="est_oservicio" for="est_oservicio"
                                                class="form-control">
                                                <option value="no atendida">No atendida</option>
                                                <option value="atendida">atendida</option>
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
