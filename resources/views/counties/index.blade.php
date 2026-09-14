@extends('layout')

@section('content')

<h1>Megyék listája</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="counties-table">
    <tr>
        <th class="counties-table county-name">Név</th>
        <th class="counties-table county-image">Címer</th>
    </tr>
    @foreach($counties as $county)
    <tr>
        <td class="counties-table county-name">{{ $county->name }}</td>
        <td class="counties-table county-image"><img src="{{ $county->arms }}" width="50"></td>
    </tr>
    @endforeach
</table>

@endsection