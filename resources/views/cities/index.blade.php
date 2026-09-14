@extends('layout')

@section('content')

<h1>Városok listája</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="counties-table">
    <tr>
        <th class="counties-table county-name">Név</th>
        <th class="counties-table county-name">Irányítószám</th>
        <th class="counties-table county-name">Lakosság</th>
        <th class="counties-table county-name">Vármegye</th>
    </tr>
    @foreach($cities as $city)
    <tr>
        <td class="counties-table county-name">{{ $city->city }}</td>
        <td class="counties-table county-name">{{ $city->zip_code }}</td>
        <td class="counties-table county-name">{{ $city->population }}</td>
        <td class="counties-table county-name">{{ $city->county->name }}</td>
    </tr>
    @endforeach
</table>

@endsection