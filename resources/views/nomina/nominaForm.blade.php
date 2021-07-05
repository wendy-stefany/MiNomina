@extends('layouts.majestic')
@section('contenido')
@include('parciales.form-errors')
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  @if(isset($nomina))
                  <div class="display-4">Editar Nomina</div>
                    <form action="{{route('nomina.update',$nomina)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                    @else
                    <div class="display-4">Nueva Nomina</div>
                    <form action="{{route('nomina.store')}}" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">N.Empleado</label>
                                <div class="col-sm-9">
                                    <select class="form-control-lg form-control" name="empleado_id" id="empleado_id">
                                     @foreach($empleados as $empleadoo)
                                    @if(isset($nomina))
                                        <option value="{{$nomina->empleado_id}}" {{ old('empleado_id',$nomina->empleado_id)==$empleadoo->id ? 'selected' : ''  ?? ''}}>
                                            {{ $empleadoo->id }}
                                        </option>
                                        @else
                                        <option value="{{$empleadoo->id}}">
                                         {{ $empleadoo->id }}
                                        </option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semana</label>
                                <div class="col-sm-9">
                                @if(isset($nomina))
                                    <input type="text" class="form-control" name="semana" id="semana" value="{{ $nomina->semana ?? ''}}" readonly/>
                                @else
                                    <input type="text" class="form-control" name="semana" id="semana" value="<?php echo date("W");?>" readonly/>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description">
                      Nomina PDF
                    </p>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Documento</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="file" id="documento" name="documento" accept=".pdf" value="{{ old('documento') ?? $nomina->documento ?? ''}}">
                                            
                                        </div>
                                     </div>
                                 </div>
                            </div>
                        </div>

                        
                           
                    </div>
                    <p class="card-description">
                      Salario
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-success">Percepcion</label>
                          <div class="col-sm-8">
                            <div class="form-group row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar) " name="percepcion" id="percepcion" value="{{ old('percepcion') ?? $nomina->percepcion ?? ''}}">
                                    
                                </div>
                            </div>
                      </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-danger">Deduccion</label>
                          <div class="col-sm-9">
                            <div class="form-group row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="deduccion" id="deduccion" value="{{ old('percepcion') ?? $nomina->deduccion ?? ''}}">
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <button type="sumit" class="btn btn-primary btn-lg btn-block">
                        <i class="mdi mdi-content-save-all"></i>                      
                             Subir
                        </button>
                    </div>
                </form>
                </div>
              </div>
@endsection