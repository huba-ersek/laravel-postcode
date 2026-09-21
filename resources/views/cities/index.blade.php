@extends('layout')

@section('content')

<h1>Városok listája</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form method="GET" action="">
    @csrf
    <label for="search-name">Város neve: </label>
    <input type="text" id="search-name" name="name" value="{{ old('name', $name) }}" />
    <br>
    <label for="filter-county">Megye: </label>
    <select id="filter-county" name="county-id">
        <option value=""></option>
        @foreach($counties as $county)
        <option value="{{ $county->id }}" @selected(old('county-id', $countyId) == $county->id)>{{ $county->name }}</option>
        @endforeach
    </select>
    <br>
    <input value="Keresés" type="submit" />
</form>
<br>

<table class="listing-table">
    <tr>
        <th class="listing-table listing-cell">Név</th>
        <th class="listing-table listing-cell">Irányítószám</th>
        <th class="listing-table listing-cell">Lakosság</th>
        <th class="listing-table listing-cell">Vármegye</th>
    </tr>
    @foreach($cities as $city)
    <tr>
        <td class="listing-table listing-cell">{{ $city->city }}</td>
        <td class="listing-table listing-cell">{{ $city->zip_code }}</td>
        <td class="listing-table listing-cell">{{ $city->population }}</td>
        <td class="listing-table listing-cell">{{ $city->county->name }}</td>
    </tr>
    @endforeach
</table>

<div class="paginator">
    {{ $cities->links() }}
</div>

@endsection