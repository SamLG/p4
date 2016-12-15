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
    <img alt="plant" class="plantImage" src="{{ $plant->image }}"/>
    <h2>Here is your plant</h2>

    <h3>{{ $plant->common_name }} ({{ $plant->scientific_name}})</h3>
    <h4>Description</h4>
    <p>
        @if( $plant->description )
            {{$plant->description}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Description</button></a>
        @endif
    </p>
    <h4>Success</h4>
    <p>
        @if( $plant->success )
            {{$plant->success}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Success</button></a>
        @endif
    </p>
    <h4>USDA Zones</h4>
    <p>
        @if( $plant->min_zone > 0 )
            {{$plant->min_zone}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Minimum</button></a>
        @endif -
        @if( $plant->max_zone > 0 )
            {{$plant->max_zone}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Maximum</button></a>
        @endif
    </p>
    <h4>Height</h4>
    <p>
        @if( $plant->height )
            {{$plant->height}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Height</button></a>
        @endif
    </p>
    <h4>Bloomtime</h4>
    <p>
        @if( $plant->bloomtime )
            {{ $plant->bloomtime }}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Bloomtime</button></a>
        @endif
    </p>
    <h4>Planted (when)</h4>
    <p>
        @if( $plant->planted )
            {{$plant->planted}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Planted</button></a>
        @endif
    </p>
    <h4>Location</h4>
    <p>
        @if( $plant->location > 0 && $plant->location <= $garden->locations)
            {{$plant->location}}
        @else
            <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Add Location</button></a>
        @endif
    </p>
    <br>
    <a href='/gardens/{{$garden->id}}/plants/delete/{{ $plant-> id}}'><button>Delete</button></a>
    <a href='/gardens/{{$garden->id}}/plants/edit/{{ $plant-> id}}'><button>Edit</button></a>
    <a href='/gardens/{{$garden->id}}/plants/move/{{ $plant-> id}}'><button>Move to Wishlist</button></a>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
