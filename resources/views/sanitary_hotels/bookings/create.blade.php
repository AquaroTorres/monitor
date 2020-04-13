@extends('layouts.app')

@section('title', 'Crear Booking')

@section('content')
<h3 class="mb-3">Crear Booking</h3>

<form method="POST" class="form-horizontal" action="{{ route('sanitary_hotels.bookings.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-4 col-md-4">
            <label for="for_patient_id">Paciente</label>
            <select name="patient_id" id="for_patient_id" class="form-control">
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->fullName }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-4 col-md-4">
            <label for="for_room_id">Hotel - Habitación</label>
            <select name="room_id" id="for_room_id" class="form-control">
                @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->hotel->name }} -{{ $room->number }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    <div class="form-row">
        <fieldset class="form-group col-4 col-md-2">
            <label for="for_from">Desde</label>
            <input type="date" class="form-control date" name="from" id="for_from" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-4 col-md-2">
            <label for="for_to">Hasta (Estimado)</label>
            <input type="date" class="form-control date" name="to" id="for_to" required placeholder="">
        </fieldset>


    </div>

    <fieldset class="form-group" >
        <label for="for_indications">Indicaciones</label>
        <input type="textarea" class="form-control"  name="indications" id="for_indications"  placeholder="Escribir Indicaciones en caso de ser necesario">
    </fieldset>

    <fieldset class="form-group" >
        <label for="for_observations">Observaciones</label>
        <input type="textarea" class="form-control"  name="observations" id="for_observations"  placeholder="Escribir Observaciones en caso de ser necesario">
    </fieldset>


    <button type="submit" class="btn btn-primary">Guardar</button>


</form>

@endsection

@section('custom_js')

@endsection