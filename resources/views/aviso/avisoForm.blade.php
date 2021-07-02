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
                  @if(isset($aviso))
                  <div class="display-4">Editar Aviso</div>
                    <form action="{{route('aviso.update',$aviso)}}" method="POST">
                        @method('PATCH')
                    @else
                    <div class="display-4">Nuevo Aviso</div>
                    <form action="{{route('aviso.store')}}" method="POST">
                    @endif
                    @csrf
                    <p class="card-description">
                      Personal
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Aviso</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Control de Riesgos" value="{{ old('nombre') ??$aviso->nombre ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Remitente</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remitente" id="remitente" placeholder="Jose estrada" value="{{ old('remitente') ??$aviso->remitente ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Departamento</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="departamento" id="departamento" placeholder="1234" value="{{ old('departamento_id') ??$aviso->departamento_id ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PDF</label>
                                <div class="col-sm-9">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="file" id="documento" name="documento" accept=".pdf"  value="{{ old('documento') ??$aviso->documento ?? ''}}">
                                        </div>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="mdi mdi-content-save-all"></i>                      
                             Guardar
                        </button>
                    </div>
                </form>
                </div>
              </div>
@endsection