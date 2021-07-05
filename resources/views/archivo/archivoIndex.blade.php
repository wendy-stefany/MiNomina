@extends('layouts.majestic')
@section('contenido1')
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                  <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-3">
                        <div class="display-4">Empleados</div>
                    </div>
                  </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-primary btn-block" onclick="location.href='empleado/create'" >
                            <i class="mdi mdi-playlist-plus"></i>Nuevo
                        </button>
                    </div>
                </div>
              </div>
            </div>
@endsection
@section('contenido')
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr class="text-info">
                        <th>nombre origianl</th>
                        <th>ruta</th>
                        <th>mmime</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($archivos as $archivo)
                        <tr>
                          
                          <td>
                              {{$archivo->nombre_original}}
                              
                          </td>
                          <td >
                              {{$archivo->ruta}}
                          </td>
                          <td>
                              {{$archivo->mime}}
                          </td>
                          <td>
                             <a href="{{route('archivo.descargar',$archivo)}}">Descargar</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    
@endsection