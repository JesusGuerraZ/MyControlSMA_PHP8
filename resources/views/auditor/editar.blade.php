@extends('layouts.app')
@section('title')
    MyControlSMA-Editar auditoria
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar auditoria médica</h3>
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


                    <form action="{{ route('auditor.update',$auditor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_oservicio">Servicios</label>
                                    <input type="number" name="id_oservicio" class="form-control" value="{{ $auditor->id_oservicio }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">

                                <div class="form-floating">
                                    <label for="id_facturacion">Id. Facturación</label>
                                    <input type="number" name="id_facturacion" class="form-control" value="{{ $auditor->id_facturacion }}">

                                </div><br><br>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="aprobada_auditoria">Vigencia</label>
                                    <select type="text" class="form-control" name="vig_contrato"
                                        id="vig_contrato">
                                        <option value="No">No</option>
                                        <option value="Sí">Sí</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="fec_apr_auditoria">Fecha de aprobación (Auditoría)</label>
                                    <input type="date" name="fec_apr_auditoria" class="form-control" value="{{ $auditor->fec_apr_auditoria }}">

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="obs_auditoria">Observaciones</label>
                                    <textarea class="form-control" name="obs_auditoria"
                                    <textarea class="form-control" name="obs_auditoria" style="height: 100px">{{ $auditor->obs_auditoria }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div>
                                            <input type="checkbox" id="checkFirma" name="checkFirma" onclick="Firma()"><b> Certifico la veracidad de la información aquí cargada y que esta ha sido registrada de manera completa. </b><br> <br>
                                       </div>
                                   </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
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











