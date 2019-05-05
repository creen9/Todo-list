@extends('layouts.app')

@section('content')
    <h1>Seznam opravil</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Oseba</th>
                <th>Opis</th>
                <th>Datum zaključka</th>
                <th>Zaključeno</th>
            </tr>
        </thead>
        <tbody>
            @if(count($opravila) > 0)
                @foreach($opravila as $opravilo)
                <tr>
                    <th><a href="opravila/{{$opravilo->id}}">{{$opravilo->naziv}}</a></th>
                    <td>{{$opravilo->oseba}}</td>
                    <td>{{$opravilo->opis}}</td>
                    <td>{{$opravilo->datum_zakljucka}}</td>
                    <td>
                        @if($opravilo->je_zakljucen)
                            Da
                        @else
                            Ne
                        @endif
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection