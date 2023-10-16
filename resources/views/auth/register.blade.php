@extends('layouts.master')
@section('title')
    Registrar
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Usuarios
        @endslot
        @slot('title')
            Registrarse
        @endslot
    @endcomponent
    @php
        $user = Auth::user();
    @endphp
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Registrate</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <form class="needs-validation" novalidate method="POST"
                                  action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text"
                                                   class="form-control @error('nombre') is-invalid @enderror"
                                                   name="nombre" value="{{ old('nombre') }}" id="nombre"
                                                   placeholder="Ingrese el nombre" required>
                                            @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label for="name"><span class="text-danger">*</span>Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" id="email"
                                                   placeholder="Ingrese el correo" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label for="name"><span class="text-danger">*</span>Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" id="password" placeholder="Ingrese la contraseña"
                                                   required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label for="userpassword">Password <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation" id="input-password"
                                                   placeholder="Confirmar Password" required>
                                            <label for="input-password">Confirmar Password</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('dui') is-invalid @enderror"
                                                   name="dui" value="{{ old('dui') }}" id="dui"
                                                   placeholder="Ingrese el dui" required>
                                            @error('dui')

                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el dui
                                            </div>
                                            <label for="dui"><span class="text-danger">*</span>DUI</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                                   name="telefono" value="{{ old('telefono') }}" id="telefono"
                                                   placeholder="(xxx)xxxX-xxxx" required>
                                            @error('telefono')

                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el telefono
                                            </div>
                                            <label for="telefono"><span class="text-danger">*</span>Telefono</label>
                                        </div>
                                    </div>
                                    @if ($user && $user->rol->nombre == 'Administrador')
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                        name="id_rol">
                                                    <option selected>Seleccione el rol</option>
                                                    @foreach($roles as $rol)
                                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="id_rol"><span class="text-danger">*</span>Rol</label>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                                 </div>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div><!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/cleave.js/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-masks.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>

@endsection
