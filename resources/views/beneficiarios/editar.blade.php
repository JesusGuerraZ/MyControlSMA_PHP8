@extends('layouts.app')
@section('title')
    MyControlSMA-Editar beneficiario
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Beneficiarios</h3>
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


                            <form action="{{ route('beneficiarios.update', $beneficiario->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label for="ced_beneficiario">Documento</label>
                                                <input type="text" name="ced_beneficiario" class="form-control" value="{{ $beneficiario->ced_beneficiario }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">

                                            <div class="form-group">
                                                <label for="nom_beneficiario">Nombre</label>
                                                <input type="text" name="nom_beneficiario" class="form-control" value="{{ $beneficiario->nom_beneficiario }}">

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="ape_beneficiario">Apellido</label>
                                                <input type="text" name="ape_beneficiario" class="form-control" value="{{ $beneficiario->ape_beneficiario }}">

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="dir_beneficiario">Dirección</label>
                                                <input type="text" name="dir_beneficiario" class="form-control" value="{{ $beneficiario->dir_beneficiario }}">

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label for="gen_beneficiario">Genero</label>
                                                <select name="gen_beneficiario" id="" class="form-control" value="{{ $beneficiario->gen_beneficiario }}">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group">
                                                <label for="id_parentesco">Parentesco</label>
                                                <select name="id_parentesco" id="" class="form-control">
                                                    <option value="Hijo">Hijo</option>
                                                    <option value="HIJOS ENTENADOS">HIJOS ENTENADOS</option>
                                                    <option value="Hermano">Hermano</option>
                                                    <option value="Conyuge">Conyuge</option>
                                                    <option value="Madre-Padre">Madre-Padre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group">
                                                <label for="fec_nac_beneficiario">Fec. Nacimiento</label>
                                                <input type="date" name="fec_nac_beneficiario" class="form-control"  value="{{ $beneficiario->fec_nac_beneficiario }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group">
                                                <label for="edad_beneficiario">Edad</label>
                                                <input type="text" name="tel_beneficiario" class="form-control" value="{{ $beneficiario->edad_beneficiario }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label for="tel_beneficiario">Teléfono</label>
                                                <input type="text" name="tel_beneficiario" class="form-control" value="{{ $beneficiario->tel_beneficiario }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="">Funcionario</label>
                                                {!! Form::select('nom_funcionario', $funcionario2, [], ['class' => 'form-control' ]) !!}
                                            </div>
                                        </div><br>
                                        <div class="col-xs-12 col-sm-12 col-md-12"><br>
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
