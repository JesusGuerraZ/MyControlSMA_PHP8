@extends('layouts.app')
@section('title')
    MyControlSMA-Generar revision
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva validacion</h3>
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

                            <form action="{{ route('validador.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="pdf_fac_validador">PDF Factura</label><br>
                                            <input type="file" name="pdf_fac_validador" class="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="pdf_firmas_rjuridica">PDF Firmas</label><br>
                                            <input type="file" name="pdf_firmas_validador" class="">
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="est_validador">Estado</label>
                                            <select type="text" class="form-control" name="est_validador"
                                                id="est_validador">
                                                <option value="NO REVISADO">NO REVISADO</option>
                                                <option value="revisado">Revisado</option>
                                                <option value="corregir">Corregir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="obs_validador">Observaciones</label>
                                            <input type="text" name="obs_validador" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <input type="button" class="btn btn-secondary" value="Cancelar" onClick="history.go(-1);">
                                    </div>
                                </div>
                        </div>
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
