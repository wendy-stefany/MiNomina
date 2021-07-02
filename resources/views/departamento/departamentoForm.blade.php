@extends('layouts.majestic')
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        <h5 class=" text-center mdi mdi-alert">
            Verifique los campos del formulario</h5>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  @if(isset($departamento))
                  <div class="display-4">Editar Departamento</div>
                    <form action="{{route('departamento.update',$departamento)}}" method="POST">
                        @method('PATCH')
                    @else
                    <div class="display-4">Nuevo Departamento</div>
                    <form action="{{route('departamento.store')}}" method="POST">
                    @endif
                    @csrf
                    <p class="card-description">
                      Personal
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Clave</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" id="id" placeholder="1234" value="{{ old('id') ?? $departamento->id ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Departamento</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Ventas" value="{{ old('departamento') ?? $departamento->departamento ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Telefono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="3333333333" value="{{ old('telefono') ?? $departamento->telefono ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Encargado</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="encargado" id="encargado" placeholder="Mario Juarez" value="{{ old('encargado') ?? $departamento->encargado ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <button type="sumit" class="btn btn-primary btn-lg btn-block">
                        <i class="mdi mdi-content-save-all"></i>                      
                             Guardar
                        </button>
                    </div>
                </form>
                </div>
              </div>
@endsection