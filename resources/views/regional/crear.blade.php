@extends('layouts.app')
@section('title')
    MyControlSMA-Crear regional
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Regionales</h3>
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

                    <form action="{{ route('regional.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nom_regional">Nombre de la regional</label>
                                   <input type="text" name="nom_regional" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                <label for="dir_regional">Director(a) regional</label>
                                <input type="text" name="dir_regional" class="form-control">

                                </div><br><br>

                            <button type="submit" class="btn btn-primary">Guardar</button>
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
