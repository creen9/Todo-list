@extends('layouts.app')

@section('content')
    <h1>{{$opravilo->naziv}}</h1>
    <h4>{{$opravilo->oseba}}</h4>
    <p>Opis: {{$opravilo->opis}}</p>
    <p>Datum zaključka: {{$opravilo->datum_zakljucka}}</p>

    @if ($opravilo->je_zakljucen)
        <p>Opravilo je zaključeno</p>
    @else
        <form action="/opravila/{{$opravilo->id}}/zakljuci" method="post">
        {!! csrf_field() !!}
            <input type="submit" value="Zaključi" class="btn btn-primary">
        </form>
    @endif
    <br><br>
    <a href="/opravila/{{$opravilo->id}}/edit" class="btn btn-primary">Uredi</a>
    <form action="/opravila/{{$opravilo->id}}" method="post" style="float:right;">
    {!! csrf_field() !!}
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" value="Izbriši" class="btn btn-danger">
    </form>
@endsection