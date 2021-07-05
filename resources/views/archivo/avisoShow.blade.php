@extends('layouts.majestic')

@section('contenido1')
  <div class="row">
    <div class="col-md-11 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-3">
              <div class="display-4 text-primary">{{$aviso->nombre}}</div>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block" title="Descargar">
                    <i class="mdi mdi-download text-primary"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0" title="Editar" onclick="location.href='{{route('aviso.edit', $aviso->id)}}'">
                    <i class="mdi mdi-pencil text-success"></i>
                  </button>
                  <form action="{{route('aviso.destroy', $aviso)}}" method="POST">
                    @csrf
                     @method('DELETE')
                     <button type="sumbit" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0" title="Eliminar">
                    <i class="mdi mdi-delete text-danger"></i>
                  </button>
                 </form>
                  <button class="btn btn-primary mt-2 mt-xl-0"><i class="mdi mdi-plus" onclick="location.href='{{route('aviso.create')}}'"></i>Nuevo</button>
            </div>
      </div>
    </div>
  </div>
@endsection
@section('contenido')
@include('parciales.form-errors')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
              Circulas: {{$aviso->nombre}}
              <p class="card-description text-info">
                Fecha de emision: {{$aviso->created_at->format('Y-m-d')}}
              </p></h4>
               <h4 class="card-title"><p class="card-description">
               Remitente: {{$aviso->remitente}}
              </p></h4>
              <h4 class="card-title">Departamentos a los que es dirigido: </h4>
              @foreach($aviso->departamentos as $departamento)
              <p class="card-description">{{$departamento->id}} - {{$departamento->departamento}}</p>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Actualizar Departamentos</h4>
                  </button>
                   <form action="{{ route('aviso.agrega-departamento', $aviso->id)}}" method="POST">
                        @csrf
                        <div >
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <select class="form-control form-control-lg" name="departamento_id[]" id="departamento_id" multiple>
                                @foreach($departamentos as $departamento)
                                    <option value="{{ $departamento->id}}" {{ array_search($departamento->id, $aviso->departamentos->pluck('id')->toArray()) !== false ? 'selected' : '' }} >{{$departamento->id}} - {{$departamento->departamento}}</option>
                                @endforeach
                                </select>
                                </div>
                                <!-- <input type="hidden" name="aviso_id" value="{{ $aviso->id}}"> -->
                            </div>
                        </div>
                        <div >
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="mdi mdi-content-save-all"></i>                      
                                Agregar
                            </button>
                        </div>
                  </form>
            </div>
          </div>
        </div>      
@endsection