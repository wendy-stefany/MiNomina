@extends('layouts.majestic')
@section('contenido')
    <h1>Mis Nomina {{$nomina->semana}}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Semana</th>
                <th>Nomina</th>
            </tr>
        </thead>
        <tbidy>
       
            <tr>
                <td>{{$nomina->semana}}</td>
                <td>{{$nomina->documento}}</td>
            </tr>
        
        </tbidy>
    </table>
    <form action="{{route('nomina.destroy', $nomina)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar Nomina">
    </form>
    <a href="{{route('nomina.edit', $nomina->id)}}" > editar</a>
@endsection