
@extends('layouts.app')
@section('title')
    MyControlSMA-Inicio
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <body background="img/fondo-SMA.png" style= "background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">

            <h3 class="page__heading "style="text-align:center">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="row">
                                      <div class="col-md-4 col-xl-3">
                                        <div class="card bg-c-1 order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-tag f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-3">

                                    <div class="card bg-c-2 order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-lock f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xl-3">
                                        <div class="card bg-c-3 order-card">
                                            <div class="card-block">
                                                <h5>Funcionarios</h5>
                                                @php
                                                 use App\Models\funcionarios;
                                                $cant_funcionarios = funcionarios::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-tie f-left"></i><span>{{$cant_funcionarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/funcionarios" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-3">
                                        <div class="card bg-c-4 order-card">
                                            <div class="card-block">
                                                <h5>Beneficiarios</h5>
                                                @php
                                                 use App\Models\beneficiarios;
                                                $cant_beneficiarios = beneficiarios::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_beneficiarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/beneficiarios" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>

@endsection

