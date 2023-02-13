@extends('layouts.nav')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
@endsection
@section('title', 'Party Planner')
@section('content')
<div id="titlu">Party Planner</div>
<div id="descriere"> Party Planner este locul in care va puteti organiza petrecerea perfecta! Lorem Ipsuum ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock</div>

    <div id="container-info">
        <div CLASS="box">
            <p>Creeaza-ti cont</p>
        </div>
        <div CLASS="box">
            <p>Plan your party</p>
        </div>
        <div CLASS="box">
            <p>Invite your friends to join</p>
        </div>
    </div>
    <div id="button-div">
<button class="button-78" role="button" onclick="window.location='{{ route("events.create") }}'">Create your party!</button>
</div>
@endsection
