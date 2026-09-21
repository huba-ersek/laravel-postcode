@extends('layout')

@section('content')

<h1>Új város</h1>

@if($errors->any())
<div class="alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('cities.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Város neve: </label>
        <input type="text" id="name" name="city">
        <br>
        <label for="county">Város megyéje: </label>
        <select id="county" name="county_id">
            @foreach($counties as $county)
            <option value="{{ $county->id }}">{{ $county->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="zip">Város irányítószáma: </label>
        <input type="number" id="zip" name="zip_code">
        <br>
        <label for="pop">Város populációja: </label>
        <input type="number" id="pop" name="population">
        <br>
    </fieldset>
    <button type="submit">Ment</button>
</form>


@endsection