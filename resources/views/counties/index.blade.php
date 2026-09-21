@extends('layout')

@section('content')

<h1>Megyék listája</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form method="GET" action="">
    @csrf
    <label for="search-name">Megye neve: </label>
    <input type="text" id="search-name" name="name" value="{{ old('name', $name) }}" />
    <input value="Keresés" type="submit" />
</form>
<br>

<a href="{{ route('counties.create') }}" class="click-link">
    <button>Új vármegye hozzáadása</button>
</a>
<br><br>
<table class="listing-table">
    <tr>
        <th class="listing-table listing-cell">Név</th>
        <th class="listing-table listing-cell">Címer</th>
        <th class="listing-table listing-cell">Összpopuláció</th>
    </tr>
    @foreach($counties as $county)
    <tr>
        <td class="listing-table listing-cell">{{ $county->name }}</td>
        <td class="listing-table listing-cell"><img src="{{ $county->arms }}" width="50"></td>
        <td class="listing-table listing-cell">{{ number_format($county->population, 0, '.', ' ') }}</td>
    </tr>
    @endforeach
</table>

@endsection