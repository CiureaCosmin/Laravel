@extends('layouts.nav')
@section('title', 'Lista Produse')
@section('content')
    <div class="container products">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail" >
                       <a style="cursor: pointer;" onclick="window.location.href='{{url('/tasks/'.$product->id)}}'">
                           <img src="{{ $product->photo }}" style="width:500px; aspect-ratio: 1">
                       </a>
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>{{str_limit(strtolower($product->description), 50)}}</p>
                            <p><strong>Pret: </strong> {{ $product->price}}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}"
                                                     class="btn btn-warning btn-block text-center" role="button">Pune in cos</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection
