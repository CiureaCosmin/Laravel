@extends('layouts.nav')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/img-slider.css') }}">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
@endsection
@section('title', 'Participa la petrecere!')
@section('content')
<div class="signupSection">
    <div class="info">
        <h2>Join party!</h2>
        <div>
            <img style="max-height: 200px; max-width:auto;"src="{{asset('storage/imagini/'.$event->images)}}">
        </div>
        <p>Distractia incepe in curand!</p>

    </div>
    <form action="{{url('participa/'.$event->id)}}" method="GET" class="signupForm" name="signupform" enctype='multipart/form-data'>
        @csrf
        <h2>Detaliile petrecerii</h2>
        <ul class="noBullet">

            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="name" id='name' required value="{{$event->name}}" readonly="readonly" />
                <label for="name" class="form__label">Numele Petrecerii</label>
            </div>
            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="description" id='name' required value ="{{$event->description}}" disabled="disabled" />
                <label for="name" class="form__label">Descrierea</label>
            </div>
            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="location" id='name' required disabled="disabled" value="{{$event->location}}"/>
                <label for="name" class="form__label">Locatia</label>
            </div>
            <div class="form__group field">
                <input type="date" class="form__field" placeholder="Name" name="date" id='date' min="{{date('Y-m-d')}}" required disabled="disabled" value="{{$event->date}}"/>
                <label for="name" class="form__label">Data</label>
            </div>
            <li id="center-btn">
                <input type="submit" id="join-btn" name="join" alt="Creeaza" value="Participa">
            </li>
        </ul>
    </form>
    </div>

@endsection
@section('scripts')

<script src="{{ asset('js/index.js') }}"></script>



@endsection

