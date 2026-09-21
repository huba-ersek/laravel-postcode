@extends('layout')

@section('content')

<h1>Új vármegye</h1>

@if($errors->any())
<div class="alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('counties.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Vármegye neve: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="arms">Vármegye címere: </label>
        <input type="text" name="arms" id="arms">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection