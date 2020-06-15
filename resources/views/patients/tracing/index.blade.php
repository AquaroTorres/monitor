@extends('layouts.app')

@section('title', 'Seguimiento')

@section('content')
<h3 class="mb-3">Seguimiento</h3>

<table class="table table-sm table-bordered small">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Comuna</th>
            <th>Establecimiento</th>
            <th></th>
            <th>Inicio Cuarentena</th>
            <th>Fin de Cuarentena</th>
            <th>Dias transcurridos</th>
        </tr>
    </thead>
    <tbody>
        @php $fecha = null; @endphp
        @foreach($patients as $key => $patient)
        @if($fecha != $patient->tracing->next_control_at->format('Y-m-d'))
        <tr>
            <td colspan="8" class="table-active">
                <h5>Siguiente Control: {{ $patient->tracing->next_control_at->format('Y-m-d') }}</h5>
            </td>
        </tr>
        @php $fecha = $patient->tracing->next_control_at->format('Y-m-d'); @endphp
        @endif
        <tr>
            <td>
                <a href="{{ route('patients.edit',$patient)}}">
                {{ $patient->id }}
                </a>
            </td>
            <td>{{ $patient->fullName }}</td>
            <td>{{ ($patient->demographic AND $patient->demographic->commune) ?
                    $patient->demographic->commune->name : '' }}</td>
            <td>{{ ($patient->tracing->establishment) ? $patient->tracing->establishment->alias : '' }}</td>
            <td nowrap></td>
            <td nowrap>{{ $patient->tracing->quarantine_start_at->format('Y-m-d') }}</td>
            <td nowrap>{{ $patient->tracing->quarantine_end_at->format('Y-m-d') }}</td>
            <td>{{ $patient->tracing->quarantine_start_at->diffInDays(Carbon\Carbon::now()) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('custom_js')

@endsection
