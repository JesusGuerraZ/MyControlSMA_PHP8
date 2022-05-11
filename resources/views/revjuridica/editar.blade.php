@extends('layouts.app')
@section('title')
    MyControlSMA-Editar R.juridica
@endsection
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar juridico</h3>
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


                            <form action="{{ route('revjuridica.update', $revjuridica->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <label for="pdf_fac_rjuridica">PDF Factura</label><br>
                                            <input type="file" name="pdf_fac_rjuridica" class=""
                                                value="{{ $revjuridica->pdf_fac_rjuridica }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="pdf_firmas_rjuridica">PDF Firmas</label><br>
                                            <input type="file" name="pdf_firmas_rjuridica" class=""
                                                value="{{ $revjuridica->pdf_firmas_rjuridica }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label for="est_rjuridica">Estado</label>
                                            <select type="text" class="form-control" name="est_validador"
                                                id="est_validador">
                                                <option value="NO REVISADO">NO REVISADO</option>
                                                <option value="revisado">Revisado</option>
                                                <option value="corregir">Corregir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="obs_rjuridica">Observaciones</label>
                                            <input type="text" name="obs_rjuridica" class="form-control"
                                                value="{{ $revjuridica->obs_rjuridica }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br>
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
