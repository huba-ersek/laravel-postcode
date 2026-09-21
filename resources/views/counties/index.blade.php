@extends('layout')

@section('content')

<h1>Megyék listája</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('counties.create') }}" class="click-link">
    <button>Új vármegye hozzáadása</button>
</a>
<br><br>
<table class="counties-table">
    <tr>
        <th class="counties-table county-cell">Név</th>
        <th class="counties-table county-cell">Címer</th>
        <th class="counties-table county-cell">Összpopuláció</th>
    </tr>
    @foreach($counties as $county)
    <tr>
        <td class="counties-table county-cell">{{ $county->name }}</td>
        <td class="counties-table county-cell"><img src="{{ $county->arms }}" width="50"></td>
        <td class="counties-table county-cell">{{ $county->population }}</td>
    </tr>
    @endforeach
</table>

@endsection