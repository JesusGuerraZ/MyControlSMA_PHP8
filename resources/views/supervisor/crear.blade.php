@extends('layouts.app')
@section('title')
    MyControlSMA-Generar revisison
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Supervisión</h3>
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

                            <form action="{{ route('supervisor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">

                                        <div class="form-group">
                                            <label for="est_supervisor">Estado</label>
                                            <input type="text" name="est_supervisor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="firma_oserv_supervisor">Firma Servicio</label>
                                            <input type="text" name="firma_oserv_supervisor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="firma_oaten_supervisor">Firma Atencion</label>
                                            <input type="text" name="firma_oaten_supervisor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="firma_aud_supervisor">Firma Auditoria</label>
                                            <input type="text" name="firma_aud_supervisor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="obs_supervisor">Observaciones</label>
                                            <input type="text" name="obs_supervisor" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <label for="pdf_fac_supervisor">PDF</label><br>
                                            <input type="file" name="pdf_fac_supervisor" class="">
                                        </div>  
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div>
                                        <input type="checkbox" id="checkFirma" name="checkFirma" onclick="Firma()"><b>
                                            Certifico la veracidad de la información aquí cargada y que esta ha sido
                                            registrada de manera completa. </b><br><br>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="btnFirma" disabled>Guardar</button>
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
