@extends('layouts.app')
@section('title')
    MyControlSMA-Editar facturacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar facturacion</h3>
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


                            <form action="{{ route('facturador.update', $facturador->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-2">
                                        <div class="form-group">
                                            <label for="">Numero de orden</label>
                                            <input type="number" name="id_oservicio" class="form-control"  value="{{ $facturador->id_oservicio }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="valor_factura">Valor de factura</label>
                                            <input type="text" name="valor_factura" class="form-control" value="{{ $facturador->valor_factura }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_reg_factura">Fec.Registro Factura</label>
                                            <input type="date" name="fec_reg_factura" class="form-control" value="{{ $facturador->fec_reg_factura }}">

                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_factura">Feha factura</label>
                                            <input type="date" name="fec_factura" class="form-control" value="{{ $facturador->fec_factura }}">
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
                                            <textarea type="text" name="obs_facturacion" class="form-control"
                                            value="">{{ $facturador->obs_facturacion }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-8">

                                        <div class="form-group">
                                            <label for="pdf_facturacion">PDF Facturacion</label><br>
                                            <input type="file" name="pdf_facturacion" class="" value="{{ $facturador->pdf_facturacion }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div>
                                            <input type="checkbox" id="checkFirma" name="checkFirma" onclick="Firma()"><b> Certifico la veracidad de la información aquí cargada y que esta ha sido registrada de manera completa. </b><br> <br>
                                       </div>
                                   </div>

                                    <div class="col-xs-2 col-sm-2 col-md-8">
                                       <button type="submit" class="btn btn-primary" id="btnFirma" disabled>Guardar</button>
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
