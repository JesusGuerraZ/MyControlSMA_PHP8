@extends('layouts.app')
@section('title')
    MyControlSMA-Editar atencion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar orden de atencion</h3>
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


                    <form action="{{ route('oatencion.update',$oatencion->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="id_oservicio">Número orden de servicio</label>
                                            <input type="text" name="id_oservicio" class="form-control" value="{{ $oatencion->id_oservicio }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">

                                        <div class="form-group">
                                            <label for="fec_oatencion">Fecha de atención</label>
                                            <input type="date" name="fec_oatencion" class="form-control" value="{{ $oatencion->fec_oatencion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <div class="form-group">
                                            <label for="num_oatencion">Núm.Atencion</label>
                                            <input type="text" name="num_oatencion" class="form-control" value="{{ $oatencion->num_oatencion }}">

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <div class="form-group">
                                             <label for="est_oatencion">Estado</label>
                                            <select type="number" class="form-control" name="est_oatencion"
                                                id="est_oatencion">
                                                <option value="Servicio prestado">Servicio prestado</option>
                                                <option value="Orden anulada">Orden anulada</option>
                                            </select>

                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-12 col-md-10">
                                        <div class="form-group">
                                            <label for="num_oatencion">Observaciones</label>
                                            <input type="text" name="num_oatencion" class="form-control">

                                        </div>
                                            <label for="pdf_oatencion">PDF</label><br>
                                            <input type="file" name="pdf_oatencion" class="" value="{{ $oatencion->pdf_oatencion }}">
                                        </div>
                                    </div> 
                                     
                                        <div>
                                            <br> 
                                            <input type="checkbox" id="checkFirma" name="checkFirma" onclick="Firma()"><b> Certifico la veracidad de la información aquí cargada y que esta ha sido registrada de manera completa. 
                                             </b> 
                                       </div>
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-primary" id="btnFirma" disabled>Guardar</button>
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
