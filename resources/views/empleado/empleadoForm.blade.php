@extends('layouts.majestic')
@section('contenido')
@include('parciales.form-errors')
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  @if(isset($empleado))
                  <div class="display-4">Editar Empleado</div>
                    <form action="{{route('empleado.update',$empleado)}}" method="POST">
                        @method('PATCH')
                    @else
                    <div class="display-4">Nuevo Empleado</div>
                    <form action="{{route('empleado.store')}}" method="POST">
                    @endif
                    @csrf
                    <p class="card-description">
                      Personal
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') ?? $empleado->nombre ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">N.Empleado</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" id="id" value="{{ old('id') ?? $empleado->id ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Telefono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="3333333333" value="{{ old('telefono') ?? $empleado->telefono ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description">
                      Informacion
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Departamento</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-lg" name="departamento_id" id="departamento_id">
                                        @foreach($departamentos as $departamento)
                                        @if(isset($empleado))
                                        <option value="{{$empleado->departamento_id}}" {{ old('departamento_id',$empleado->departamento_id)==$departamento->id ? 'selected' : ''  ?? ''}}>
                                        {{$departamento->id}} - {{$departamento->departamento}}
                                        </option>
                                        @else
                                        <option value="{{ $departamento->id}}">
                                        {{$departamento->id}} - {{$departamento->departamento}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Usuario</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-lg" name="user_id" id="user_id">
                                        @foreach($usuarios as $usuario)
                                            <option value="{{ $usuario->id}}" >{{$usuario->id}} - {{$usuario->name}}</option>
                                        @endforeach
                                        </select>
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