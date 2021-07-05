@extends('layouts.majestic')
@section('contenido')
@include('parciales.form-errors')
  <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 
                    <div class="display-4">Nuevo Aviso</div>
                    <form action="{{route('archivo.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                    <label>Selecciona archivo
                    </label>
                    <input type="file" name="archivo" id="archivo">
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