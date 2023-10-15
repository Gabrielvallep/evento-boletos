@extends('layouts.master')
@section('title')
    Actualizar usuario
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Usuarios
        @endslot
        @slot('title')
            Actualizar
        @endslot
    @endcomponent

    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Actualizar usuario</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <form class="needs-validation" novalidate method="POST"
                                  action="{{ route('usuarios.update', ['id' => $user->id])  }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text"
                                                   class="form-control @error('nombre') is-invalid @enderror"
                                                   name="nombre" value="{{$user->nombre }}" id="nombre"
                                                   placeholder="Ingrese el nombre" required>
                                            @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el nombre
                                            </div>
                                            <label for="name"><span class="text-danger">*</span>Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{$user->email }}" id="email"
                                                   placeholder="Ingrese el correo" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el correo
                                            </div>
                                            <label for="name"><span class="text-danger">*</span>Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('dui') is-invalid @enderror"
                                                   name="dui" value="{{$user->dui }}" id="dui"
                                                   placeholder="Ingrese el dui" required>
                                            @error('dui')    @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el dui
                                            </div>
                                            <label for="dui"><span class="text-danger">*</span>DUI</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                                   name="telefono" value="{{$user->telefono }}" id="telefono"
                                                   placeholder="(xxx)xxxX-xxxx" required>
                                            @error('telefono')
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor ingrese el telefono
                                            </div>
                                            <label for="telefono"><span class="text-danger">*</span>Telefono</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                        name="id_rol">
                                                    @foreach($roles as $rol)
                                                            <option value="{{ $rol->id }}" @if ($rol->id == $user->rol->id) selected    @endif>{{ $rol->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="rol_id"><span class="text-danger">*</span>Rol</label>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="estado" name="estado">
                                                <option value="0" @if ($user->estado == 0) selected @endif>Inactivo</option>
                                                <option value="1" @if ($user->estado == 1) selected @endif>Activo</option>
                                            </select>
                                            <label for="estado">Estado</label>
                                        </div>
                                    </div>
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
