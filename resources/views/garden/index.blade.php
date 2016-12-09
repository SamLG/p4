@extends('layouts.master')


@section('title')
    Green Thumb Garden
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Here is your garden!</h2>

    <div class=gardenPlants row>
        <div class='plants col-md-6'>
            <h3>My Plants</h3>
            <a href='/plants/create'><button>Add Plant</button></a>
            @foreach($plants as $plant)
                <a href="/plants/show/{{ $plant->id }}">
                    <div class='eachPlant'>
                        <h4>{{ $plant->common_name }}</h4>
                        <p>{{ $plant->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- <div class='plants col-md-6'>
            <h3>My Wishlist Plants</h3>
            <a href='/wishlistplants/create'><button>Add Wishlist Plant</button></a>
            @foreach($wishlistplants as $wishlistplant)
                <a href="/wishlistplants/show/{{ $wishlistplant->id }}">
                    <div class='eachPlant'>
                        <h4>{{ $wishlistplant->common_name }}</h4>
                        <p>{{ $wishlistplant->description }}</p>
                    </div>
                </a>
            @endforeach
        </div> -->
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
