@extends('layouts.nav')
@section('title', 'View Event')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Event
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ url()->previous()}}">Inapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $event->name }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $event -> description }}
            </div>
            <div class="form-group">
            <strong>Descriere: </strong> {{ $event -> date }}
        </div>
            <div class="form-group">
                <strong>Pret: </strong> {{ $event->user_id}}
            </div>
            <div class="form-group">
                <strong>Participanti: </strong>  @foreach($users as $user){{  $user->name}}! @endforeach
            </div>
            @if($event->images != null){
            <div class="form-group" id="img">
                <strong>Invitati </strong> <img src="{{asset('storage/imagini/'.$event->images)}}" height="100px">
            </div>
            @endif



<!--        <form method="GET" action="{{ url('participa/'.$event->id)}}">
            @csrf
            @method('GET')
            <input type="hidden" name="event" value="{{ $event->id }}">
            <button type="submit">Participa la petrecere</button>
        </form>-->
    </div>
@endsection

