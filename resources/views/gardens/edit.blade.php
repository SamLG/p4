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
    <div class="planCreation">
        <h3>Your Garden Plan</h3>
        <canvas width="300" height="300" id="myCanvas"></canvas>
        <br>
        <button id="addLocationBTN">Add Location</button>
        <button id="saveCanvas">Save Plan</button>
        <button id="clearCanvas">Clear Plan</button>
    </div>

    <h2>Edit {{ $garden->common_name }} </h2>

    <form method='POST' action='/gardens/{{ $garden->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='planImage' id='planImage' value='{{ $garden->planImage }}' type='hidden'>
        <input name='locations' id='locations' value='{{ $garden->locations }}' type='hidden'>

        <input name='id' value='{{$garden->id}}' type='hidden'>

        <div class='form-group'>
            <label>Name:</label>
            <input
            size='50'
            type='text'
            id='name'
            name='name'
            value='{{ old('name', $garden->name) }}'
            >
            <div class='error'>{{ $errors->first('name') }}</div>
        </div>

        <div class='form-group'>
           <label>Location</label>
            <input
                size='50'
                type='text'
                id='location'
                name='location'
                value='{{ old('location', $garden->location) }}'
            >
           <div class='error'>{{ $errors->first('location') }}</div>
        </div>

        <div class='form-group'>
           <label>Description</label>
           <br>
           <textarea
               cols='100'
               rows='5'
               id='description'
               name='description'
           >{{ old('description', $garden->description) }}</textarea>

           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>When was the Garden Created</label>
           <input
                type="text"
                id='created'
                name='created'
                value='{{ old('created', $garden->created) }}'
           >
           <div class='error'>{{ $errors->first('created') }}</div>
        </div>

        <div class="form-group">
            <label for='zone'>USDA Zones</label>
            <select id='zone' name='zone'>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}' {{ ($garden->zone == $usda_zone) ? 'SELECTED' : '' }}>
                         {{$usda_zone}}
                     </option>
                 @endforeach
            </select>
           <div class='error'>{{ $errors->first('zone') }}</div>
        </div>

        <div class='form-group'>
           <label>Garden Plan Image (url)</label>
           <input
               type='text'
               id='image'
               name='image'
               value='{{ old('image', '') }}'
           >
           <div class='error'>{{ $errors->first('image') }}</div>
        </div>

        <div class='form-instructions'>
            Common Name is required
        </div>

        <button type="submit" class="btn btn-primary">Save changes</button>


        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
