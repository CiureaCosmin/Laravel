@extends('layouts.nav')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Profil
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ url('users/'.$user->id.'/edit')}}">Editeaza profilul</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Parola: </strong> {{ $user->password}}
            </div>
        </div>
    </div>
@endsection
