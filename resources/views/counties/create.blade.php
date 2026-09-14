@extends('layout')

@section('content')

<h1>Új vármegye</h1>

@error('name')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<form action="{{ route('counties.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Vármegye neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="arms">Vármegye címere</label>
        <input type="text" name="arms" id="arms">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection