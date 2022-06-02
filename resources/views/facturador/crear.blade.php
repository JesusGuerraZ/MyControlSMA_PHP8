@extends('layouts.app')
@section('title')
    MyControlSMA-Crear facturacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Facturacion</h3>
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

                            <form action="{{ route('facturador.store') }}" method="POST" id="formEnviar"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-6">
                                        <div class="form-group">
                                            <label for="aprobada_facturacion">Prestador de servicio-Filtro</label>
                                            {{-- {!! Form::select('ident_prestador', $prestador_nom, [], ['class' => 'form-control', 'id' => 'country2']) !!} --}}
                                            <select id="country2" class="form-control" name="nom_beneficiario">
                                                @foreach ($prestador_nom as $list)
                                                    <option value="{{ $list->ident_prestador }}">
                                                        {{ $list->ident_prestador}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-0">
                                        <div class="form-group">
                                            <label for="">Numero orden de servicio</label><br>
                                            <div class="scroll-2" id="state2">
                                                @foreach ($numOS as $list)
                                                    <label>{{ Form::checkbox('id_oservicio', $list->num_oservicio, false, ['class' => 'name']) }}
                                                        {{ $list->num_oservicio }}</label>
                                                    <br />
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-2">
                                        <div class="form-group">
                                            <label for="valor_factura">Valor de factura</label>
                                            <input type="" name="valor_factura" class="form-control"
                                                onchange="MASK(this,this.value,'-$##,###,###,##0',1)">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_reg_factura">Fec.Registro Factura</label>
                                            <?php $fcha = date('Y-m-d'); ?>
                                            <input type="date" name="fec_reg_factura" class="form-control"
                                                value="<?php echo $fcha; ?>">

                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_factura">Fecha factura</label>
                                            <input type="date" name="fec_factura" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="aprobada_facturacion">Estado</label>
                                            <select type="text" class="form-control" name="aprobada_facturacion"
                                                id="aprobada_facturacion">
                                                <option value="Rechazada">Rechazada</option>
                                                <option value="Aprobada">Aprobada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-9">
                                        <div class="form-group">
                                            <label for="obs_facturacion">Observaciones</label>
                                            <textarea type="text" name="obs_facturacion" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-8">

                                        <div class="form-group">
                                            <label for="pdf_facturacion">PDF Facturacion</label><br>
                                            <input type="file" name="pdf_facturacion" class="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div>
                                            <input type="checkbox" id="checkFirma" name="checkFirma" onclick="Firma()"><b>
                                                Certifico la veracidad de la información aquí cargada y que esta ha sido
                                                registrada de manera completa. </b><br> <br>
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-8">
                                        <button type="submit" class="btn btn-primary" id="btnFirma"
                                            disabled>Guardar</button>
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
