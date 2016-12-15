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
    <div class = "garden">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h2>Here is your garden</h2>

                <h3>{{ $garden->name }}</h3>
                <h4>Location</h4>
                <p>
                    @if( $garden->location )
                        {{$garden->location}}
                    @else
                        <a href='/gardens/edit/{{ $garden-> id}}'><button>Add Location</button></a>
                    @endif
                </p>
                <h4>Description</h4>
                <p>
                    @if( $garden->description )
                        {{$garden->description}}
                    @else
                        <a href='/gardens/edit/{{ $garden-> id}}'><button>Add Description</button></a>
                    @endif
                </p>
                <h4>Created</h4>
                <p>
                    @if( $garden->created )
                        {{$garden->created}}
                    @else
                        <a href='/gardens/edit/{{ $garden-> id}}'><button>Add Created</button></a>
                    @endif
                </p>
                <h4>USDA Zone</h4>
                <p>
                    @if( $garden->zone > 0 )
                        {{$garden->zone}}
                    @else
                        <a href='/gardens/edit/{{ $garden-> id}}'><button>Add Zone</button></a>
                    @endif
                </p>
                <a href='/gardens/delete/{{ $garden-> id}}'><button>Delete Garden</button></a>
                <a href='/gardens/edit/{{ $garden-> id}}'><button>Edit Garden</button></a>
            </div>
            <div class="planCreation col-xs-12 col-md-6">
                <div class="planCreationPart">
                    <h3>Your Garden Plan</h3>
                    <p>Possible planting locations: {{ $garden-> locations}}</p>
                    <canvas width="300" height="300" id="myCanvas"></canvas>
                    <input name='planImage' id='planImage' value='{{ $garden-> planImage}}' type='hidden'>
                    <input name='image' id='image' value='{{ $garden -> image}}' type='hidden'>
                </div>
                <div class="planCreationPart list">
                    <h4>Planted Locations</h4>
                    <ul class='plantLocations'>
                        @if ($garden->locations > 0)
                            @foreach ($garden->plants as $plant)
                                @if ($plant->location > 0 && $plant->location <= $garden->locations)
                                    <li>
                                        <?php
                                            echo $plant->location . ': ' . $plant->common_name;
                                        ?>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class='gardenPlants row'>
            <div class='plants col-md-6'>
                <h3>My Plants</h3>
                <a href='/gardens/{{ $garden-> id}}/plants/create'><button>Add Plant</button></a>
                @foreach($garden->plants as $plant)
                    <a href="/gardens/{{ $garden-> id}}/plants/show/{{ $plant->id }}">
                        <div class='each'>
                            <img alt="plant" class="plantImage gardenShow" src="{{ $plant->image }}"/>
                            <h4>Go To '{{ $plant->common_name }}'</h4>
                            <p>{{ $plant->description }}</p>
                            <a href='/gardens/{{ $garden-> id}}/plants/delete/{{ $plant-> id}}'><button>Delete</button></a>
                            <a href='/gardens/{{ $garden-> id}}/plants/edit/{{ $plant-> id}}'><button>Edit</button></a>
                            <a href='/gardens/{{ $garden-> id}}/plants/move/{{ $plant-> id}}'><button>Move to Wishlist</button></a>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class='plants col-md-6'>
                <h3>My Wishlist Plants</h3>
                <a href='/gardens/{{ $garden-> id}}/wishlistplants/create'><button>Add Wishlist Plant</button></a>
                @foreach($garden->wishlistplants as $wishlistplant)
                    <a href="/gardens/{{ $garden-> id}}/wishlistplants/show/{{ $wishlistplant->id }}">
                        <div class='each'>
                            <img alt="plant" class="plantImage gardenShow" src="{{ $wishlistplant->image }}"/>
                            <h4>Go To '{{ $wishlistplant->common_name }}'</h4>
                            <p>{{ $wishlistplant->description }}</p>
                            <a href='/gardens/{{ $garden-> id}}/wishlistplants/delete/{{ $wishlistplant-> id}}'><button>Delete</button></a>
                            <a href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'><button>Edit</button></a>
                            <a href='/gardens/{{ $garden-> id}}/wishlistplants/move/{{ $wishlistplant-> id}}'><button>Add to Plants</button></a>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@section('body')
@stop
