@extends('layouts.app')

@section('content')
<h1>Dodaj Opravilo</h1>
<form action="/opravila" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="naziv">Naziv</label>
        <input type="text" name="naziv" class="form-control" placeholder="Naziv">
    </div>
    <div class="form-group">
        <label for="oseba">Oseba</label>
        <select name="oseba" class="form-control">
            @if(count($osebe) > 0)
                @foreach($osebe as $oseba)
                <option value="{{$oseba->ime}} {{$oseba->priimek}}">{{$oseba->ime}} {{$oseba->priimek}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="opis">Opis</label>
        <textarea name="opis" cols="50" rows="10" class="form-control" placeholder="Opis"></textarea>
    </div>
    <div class="form-group">
        <label for="datum_zakljucka">Datum zaključka</label>
        <input type="date" name="datum_zakljucka" class="form-control">
    </div>
    <div>
        <input type="submit" value="Potrdi" class="btn btn-primary">
    </div>
</form>
@endsection