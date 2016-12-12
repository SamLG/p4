@extends('layouts.master')


@section('title')
    Green Thumb
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Here is your wishlist plant</h2>

    <h3>{{ $wishlistplant->common_name }} ({{ $wishlistplant->scientific_name}})</h3>
    <h4>Description</h4>
    <p>
        @if( $wishlistplant->description )
            {{$wishlistplant->description}}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Description</button></a>
        @endif
    </p>
    <h4>Prior Success</h4>
    <p>
        @if( $wishlistplant->prior_success )
            {{$wishlistplant->prior_success}}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Prior Success</button></a>
        @endif
    </p>
    <h4>USDA Zones</h4>
    <p>
        @if( $wishlistplant->min_zone )
            {{$wishlistplant->min_zone}}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Minimum</button></a>
        @endif -
        @if( $wishlistplant->max_zone )
            {{$wishlistplant->max_zone}}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Maximum</button></a>
        @endif
    </p>
    <h4>Height</h4>
    <p>
        @if( $wishlistplant->height )
            {{$wishlistplant->height}}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Height</button></a>
        @endif
    </p>
    <h4>Bloomtime</h4>
    <p>
        @if( $wishlistplant->bloomtime )
            {{ $wishlistplant->bloomtime }}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Bloomtime</button></a>
        @endif
    </p>
    <h4>Last Grown</h4>
    <p>
        @if( $wishlistplant->last_grown )
            {{ $wishlistplant->last_grown }}
        @else
            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Add Last Grown</button></a>
        @endif
    </p>
    <br>
    <a href='/gardens/{{ $garden-> id}}/wishlistplants/delete/{{ $wishlistplant-> id}}'><button>Delete</button></a>
    <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Edit</button></a>
    <a href='/gardens/{{ $garden-> id}}/wishlistplants/move/{{ $wishlistplant-> id}}'><button>Add to Plants</button></a>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
