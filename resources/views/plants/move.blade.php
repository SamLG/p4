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
    <h2>Move {{ $plant->common_name }} to Wishlist</h2>

    <form method='POST' action='/gardens/{{$garden->id}}/plants/move/{{ $plant->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$plant->id}}' type='hidden'>

        <div class='form-group'>
            <label>Common Name:</label>
            <input
            size='50'
            type='text'
            id='common_name'
            name='common_name'
            value='{{ old('common_name', $plant->common_name) }}'
            >
            <div class='error'>{{ $errors->first('common_name') }}</div>
        </div>

        <div class='form-group'>
           <label>Scientific Name</label>
            <input
                size='50'
                type='text'
                id='scientific_name'
                name='scientific_name'
                value='{{ old('scientific_name', $plant->scientific_name) }}'
            >
           <div class='error'>{{ $errors->first('scientific_name') }}</div>
        </div>

        <div class='form-group'>
           <label>Description</label>
           <br>
           <textarea
               cols='100'
               rows='5'
               id='description'
               name='description'
           >{{ old('description', $plant->description) }}</textarea>

           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>Prior Success with Plant</label>
           <br>
           <textarea
               cols='100'
               rows='3'
               id='success'
               name='success'
           >{{ old('success', $plant->success) }}</textarea>

           <div class='error'>{{ $errors->first('prior_success') }}</div>
        </div>

        <div class="form-group">
            <label for='min_zone'>Minimum Zone</label>
            <select id='min_zone' name='min_zone'>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}' {{ ($plant->min_zone == $usda_zone) ? 'SELECTED' : '' }}>
                         {{$usda_zone}}
                     </option>
                 @endforeach
            </select>
           <div class='error'>{{ $errors->first('min_zone') }}</div>
        </div>

        <div class="form-group">
            <label for='max_zone'>Maximum Zone</label>
            <select id='max_zone' name='max_zone'>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}' {{ ($plant->max_zone == $usda_zone) ? 'SELECTED' : '' }}>
                         {{$usda_zone}}
                     </option>
                 @endforeach
            </select>
           <div class='error'>{{ $errors->first('max_zone') }}</div>
        </div>

        <div class='form-group'>
           <label>Height</label>
           <input
               type='text'
               id='height'
               name='height'
               value='{{ old('height', $plant->height) }}'
           >
           <div class='error'>{{ $errors->first('height') }}</div>
        </div>

        <div class='form-group'>
           <label>Bloomtime</label>
           <input
               size='50'
               type='text'
               id='bloomtime'
               name='bloomtime'
               value='{{ old('bloomtime', $plant->bloomtime) }}'
           >
           <div class='error'>{{ $errors->first('bloomtime') }}</div>
        </div>

        <div class='form-group'>
            <label>Last Grown, if ever</label>
            <input
                type='text'
                id='planted'
                name='planted'
                value='{{ old('planted', $plant->planted) }}'
            >
            <div class='error'>{{ $errors->first('planted') }}</div>
        </div>

        <div class='form-instructions'>
            Common Name is required
        </div>

        <button type="submit" class="btn btn-primary">Move to Wishlist</button>


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
