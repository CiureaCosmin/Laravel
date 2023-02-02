@extends('layouts.nav')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>

@endsection
@section('title', 'Create your party!')
@section('content')

<div class="signupSection">
    <div class="info">
        <h2>Create your party!</h2>
        <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
        <p>Distractia incepe in curand!</p>
    </div>
    <form action="{{route('events.store')}}" method="POST" class="signupForm" name="signupform" enctype='multipart/form-data'>
        @csrf
        <h2>Planifica petrecerea</h2>
        <ul class="noBullet">

            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="name" id='name' required />
                <label for="name" class="form__label">Numele Petrecerii</label>
            </div>
            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="description" id='name' required />
                <label for="name" class="form__label">Descrierea</label>
            </div>
            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" name="location" id='name' required />
                <label for="name" class="form__label">Locatia</label>
            </div>
            <div class="form__group field">
                <input type="date" class="form__field" placeholder="Name" name="date" id='date' min="{{date('Y-m-d')}}" required />
                <label for="name" class="form__label">Data</label>
            </div>

            <div class="form__group field">
                <input type="file" class="form__field"  placeholder="Name" name="images" id='file' accept="image/*" />
                <label for="name" class="form__label">Poze</label>
            </div>
            <li id="center-btn">
                <input type="submit" id="join-btn" name="join" alt="Creeaza" value="Creeaza">
            </li>
        </ul>
    </form>
</div>

@endsection
@section('scripts')

<script src="{{ asset('js/index.js') }}"></script>

<script>
    $('#file').on('change', function() {

        const size =
            (this.files[0].size / 1024 / 1024).toFixed(2);

        if (size > 4) {
            alert("Poza nu trebuie sa fie mai mare de 4MB.");
            $('#file').val('');
        }
    });
    $('#file').on('change', function() {

        const size =
            (this.files[0].size / 1024 / 1024).toFixed(2);

        if (size > 4) {
            alert("Poza nu trebuie sa fie mai mare de 4MB.");
            $('#file').val('');
        }
    });
</script>


@endsection
