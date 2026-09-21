@extends('layout')

@section('content')

<h1>Megye módosítása</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('counties.update', $county->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Vármegye neve: </label>
        <input type="text" name="name" id="name" value="{{ old('name', $county->name) }}">
        <br>
        <label for="arms">Vármegye címere: </label>
        <input type="text" name="arms" id="arms" value="{{ old('arms', $county->arms) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection