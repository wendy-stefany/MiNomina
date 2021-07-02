@extends('layouts.majestic')
@section('contenido1')
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                  <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-3">
                        <div class="display-4">Mis Nominas</div>
                    </div>
                  </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-primary btn-block" onclick="location.href='nomina/create'" >
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
                        <tr>
                        <th>Semana</th>
                        <th>Percepciones</th>
                        <th>Decucciones</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($nominas as $nomina)
                        <tr>
                          <td>
                             {{$nomina->semana}}
                          </td>
                          <td class="text-success">
                             $ {{$nomina->percepcion}}
                          </td>
                          <td class=" text-danger">
                             $ {{$nomina->deduccion}}
                          </td>
                          <td class="text-primary">
                             $ {{($nomina->percepcion)-($nomina->deduccion)}}
                          </td>
                          <td>
                             {{$nomina->created_at->format('Y-m-d')}}
                          </td>
                          <td class="py-1 text-info">
                            <a class="mdi mdi-file-document" ></a>
                          </td>
                          <td>
                            <a class="mdi mdi-border-color" href="{{route('nomina.edit', $nomina->id)}}" ></a>
                          </td>
                          <td>
                            <form action="{{route('nomina.destroy', $nomina)}}" method="POST">
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