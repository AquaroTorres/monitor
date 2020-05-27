@extends('layouts.app')

@section('title', 'Listado de Habitaciones')

@section('content')

@include('sanitary_residences.nav')

<h3 class="mb-3">Listado de Habitaciones</h3>
<a class="btn btn-primary mb-3" href="{{ route('sanitary_residences.rooms.create') }}">Crear una nueva habitación</a>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Residencia</th>
            <th>Piso</th>
            <th>Numero</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $room->residence->name }}</td>
            <td>{{ $room->floor }}</td>
            <td>{{ $room->number }}</td>            
            <td>
                <a href="{{ route('sanitary_residences.rooms.edit', $room) }}" class="btn btn-secondary float-left"><i class="fas fa-edit"></i></a>
            </td>            
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('custom_js')

@endsection
