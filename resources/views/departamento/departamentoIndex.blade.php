@extends('layouts.majestic')
@section('contenido1')
  <div class="row">
    <div class="col-md-11 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-3">
              <div class="display-4">Departamentos</div>
          </div>
        </div>
          <div class="d-flex justify-content-between align-items-end flex-wrap">
              <button type="button" class="btn btn-primary btn-block" onclick="location.href='departamento/create'" >
                  <i class="mdi mdi-playlist-plus"></i>Nuevo
              </button>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('contenido')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="content-wrapper">
      <div class="row">
        @foreach($departamentos as $departamento)
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$departamento->id}} - {{$departamento->departamento}}<p class="card-description">
                {{$departamento->encargado}}
                </p></h4>
                <h4 class="card-title text-info">Telefono: {{$departamento->telefono}}</h4>
                  <br>
                  <button type="button" class="btn btn-dark btn-icon-text btn-block" onclick="location.href='{{route('departamento.edit', $departamento->id)}}'">                       
                        <i class="mdi mdi-file-check btn-icon-append"></i>
                        Editar                  
                  </button>
                  <br>
                  <form action="{{route('departamento.destroy', $departamento)}}" method="POST">
                    @csrf
                     @method('DELETE')
                    <button type="sumbit" class="btn btn-danger btn-icon-text btn-block">
                          <i class="mdi mdi-close-octagon-outline"></i>                                                    
                           Eliminar
                     </button>
                 </form>
              </div>
            </div>
          </div>
        @endforeach 
      </div>
    </div>          
  </div>
@endsection