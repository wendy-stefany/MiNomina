@extends('layouts.majestic')
@section('contenido1')
  <div class="row">
    <div class="col-md-11 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-3">
              <div class="display-4">Circulares</div>
          </div>
        </div>
          <div class="d-flex justify-content-between align-items-end flex-wrap">
              <button type="button" class="btn btn-primary btn-block" onclick="location.href='aviso/create'" >
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
      @foreach($avisos as $aviso)
        <div class="col-lg-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$aviso->remitente}}<p class="card-description">
              {{$aviso->created_at->format('Y-m-d')}}
              </p></h4>
              <h4 class="card-title text-info">{{$aviso->nombre}}</h4>
              <button type="button" class="btn btn-primary btn-block">
                      <i class="mdi mdi-arrow-down-bold-circle-outline"></i>
                      Descargar
                </button>
                <br>
                <button type="button" class=" btn btn-dark btn-block" onclick="location.href='{{route('aviso.edit', $aviso->id)}}'">
                      <i class="mdi mdi-file-check "></i>
                       Editar                  
                    </button>
                    </br>
                    <form action="{{route('aviso.destroy', $aviso)}}" method="POST">
                    @csrf
                     @method('DELETE')
                    <button type="sumbit" class=" btn btn-danger btn-block">
                      <i class="mdi mdi-close-octagon-outline "></i>                                                    
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