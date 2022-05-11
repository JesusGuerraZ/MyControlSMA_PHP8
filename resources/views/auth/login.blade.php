@extends('layouts.auth_app')
@section('title')
    MyControlSMA
@endsection
@section('content')
    <div class="card card-primary">
        <center>
            <div class="card-header" colortext="#FF6B00">
                <h4>MyControlSMA</h4>
            </div>
        </center>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        placeholder="Ingrese su Email" tabindex="1"
                        value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('email') }}" autofocus
                        required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Contraseña</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                Olvidé mi contraseña
                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                        value="{{ Cookie::get('password') !== null ? Cookie::get('password') : null }}"
                        placeholder="Ingrese su contraseña"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember"
                            {{ Cookie::get('remember') !== null ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Recordarme</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <!-- Footer -->
    <div class="row">
        <div class="col-lg-12">


            <footer class="text-center text-lg-start bg-white text-muted">

                <!-- Section: Social media -->
                <div class="container">
                    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                        <!-- Left -->

                        <!-- Right -->
                    </section>
                    <!-- Section: Social media -->

                    <!-- Section: Links  -->

                    <section class="">
                        <div class="container text-center text-md-start mt-5">
                            <!-- Grid row -->

                            <div class="row mt-3">
                                <!-- Grid column -->
                                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        Ubicación
                                    </h6>
                                    <p>
                                        <a href="#!" class="text-reset">Dirección Regional</a>
                                    </p>
                                    <p>
                                        <a class="text-reset">Cra. 43 No. 42 - 40, Piso 11, Barranquilla</a>
                                    </p>
                                    <p>
                                        <a class="text-reset">Tel: (605) 3514196</a>
                                    </p>

                                </div>

                                <!-- Grid column -->
                                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        NUESTRAS REDES SOCIALES
                                    </h6>
                                    <div>
                                        <a href="https://es-la.facebook.com/SENA/" class="me-4 text-reset">
                                            <img src="{{ asset('img/facebook.png') }}">
                                        </a>

                                        <a href="https://twitter.com/SENAComunica" class="me-4 text-reset">
                                            <img src="{{ asset('img/twitter.png') }}">
                                        </a>

                                        <a href="https://www.instagram.com/senacomunica/?hl=es-la" class="me-4 text-reset">
                                            <img src="{{ asset('img/instagram.png') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                    <!-- Content -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        <i class="fas fa-gem me-3"></i>Página principal SENA.
                                    </h6>
                                    <p>
                                        Página del SENA oficial
                                        <br>
                                        Portal Sena Sofia Plus.
                                        </br>
                                    </p>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->
                        </div>
                    </section>
                    <!-- Section: Links  -->

                    <!-- Copyright -->
                    <div class="text-center p-4" style="background-color:#e1eaed(0, 0, 0, 0.05);">
                        © 2022 Copyright:
                        <a class="text-reset fw-bold"
                            href="https://gestionredtecnoparquecolombia.com.co/inicio/barranquilla/">Tecnoparque Atlántico -
                            Tecnologías Virtuales</a>
                    </div>
                    <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>

    </div>
@endsection
