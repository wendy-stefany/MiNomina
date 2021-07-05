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
          @if(Auth::user()->tipo==='admin')
              <button type="button" class="btn btn-primary btn-block" onclick="location.href='aviso/create'" >
                  <i class="mdi mdi-playlist-plus"></i>Nuevo
              </button>
              @endif
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
              <h4 class="card-title">
              <a href="{{route('aviso.show', $aviso->id)}}">{{$aviso->nombre}}</a>
              <p class="card-description">
                {{$aviso->created_at->format('Y-m-d')}}
              </p></h4>
               <h4 class="card-title"><p class="card-description">
              {{$aviso->remitente}}
              </p></h4>
              <button type="button" class="btn btn-primary btn-block">
                      <i class="mdi mdi-arrow-down-bold-circle-outline"></i>
                      Descargar
                </button>
                <br>
                
            </div>
          </div>
        </div>  
      @endforeach 
      </div>
    </div>          
  </div>
@endsection