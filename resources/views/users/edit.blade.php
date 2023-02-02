@extends('layouts.nav')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii User</div>
        <div class="panel-body">
            <!—exista inregistrari in tabelul task 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!—populez campurile formularului cu datele aferente din tabela task -->
            {!! Form::model($user, ['method' => 'PATCH','route' =>
           ['users.update', $user->id]]) !!}
            <div class="form-group">
                <label for="name">Nume</label>
                <input type="text" name="name" class="form-control"
                       value="{{$user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <textarea name="email" class="form-control"
                          rows="3">{{ $user->email}}</textarea>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control"
                           value="{{$user->password }}">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificari" class="btn btn-info">
                <a href="{{ url('users/'.$user->id)}}" class="btn btndefault">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
