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
                        <th>No.empleado</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Departamento</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($empleados as $empleado)
                        <tr>
                          <td>
                            <a href="{{route('empleado.show', $empleado->id)}}" > {{$empleado->id}}</a>
                          </td>
                          <td>
                              {{$empleado->nombre}}
                              
                          </td>
                          <td >
                              {{$empleado->telefono}}
                          </td>
                          <td>
                              {{$empleado->departamento_id}}
                          </td>
                          <td>
                            <a class="mdi mdi-border-color" href="{{route('empleado.edit', $empleado->id)}}" ></a>
                          </td>
                          <td>
                            <form action="{{route('empleado.destroy', $empleado)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <button type="sumit" class="btn btn-inverse-primarybtn-rounded btn-icon">
                                      <i class="mdi mdi-close-circle text-danger"></i>
                                  </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    
@endsection