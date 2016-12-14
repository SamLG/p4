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
    <h2>Add a new wishlist plant</h2>

    <form method='POST' action='/gardens/{{ $garden-> id}}/wishlistplants/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Common Name</label>
            <input
                size='50'
                type='text'
                id='common_name'
                name='common_name'
                value='{{ old('common_name', 'Shasta Daisy') }}'
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
                value='{{ old('scientific_name', 'Leucanthemum × superbum') }}'
            >
           <div class='error'>{{ $errors->first('scientific_name') }}</div>
        </div>


        <div class='form-group'>
           <label>Description</label>
           <br>
           <input
               cols='100'
               rows='5'
               type='text'
               id='description'
               name='description'
               value='{{ old('description', 'Beautiful plant') }}'
           >
           <div class='error'>{{ $errors->first('published') }}</div>
        </div>

        <div class='form-group'>
            <label>Prior success with Plant</label>
            <input
                cols='100'
                rows='3'
                type='text'
                id='prior_success'
                name='prior_success'
                value='{{ old('prior_success', 'very good') }}'
            >
            <div class='error'>{{ $errors->first('prior_success') }}</div>
        </div>

        <div class="form-group">
            <label for='min_zone'>Minimum Zone</label>
            <select id='min_zone' name='min_zone'>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}'>
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
                     <option value='{{ $usda_zone }}'>
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
               value='{{ old('height', '3ft') }}'
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
                value='{{ old('bloomtime', 'spring - fall') }}'
            >
            <div class='error'>{{ $errors->first('bloomtime') }}</div>
        </div>

        <div class='form-group'>
            <label>Last Grown, if ever</label>
            <input
                type='text'
                id='last_grown'
                name='last_grown'
                value='{{ old('last_grown', '2016') }}'
            >
            <div class='error'>{{ $errors->first('last_grown') }}</div>
        </div>

        <div class='form-instructions'>
            Common Name is required
        </div>

        <button type="submit" class="btn btn-primary">Add Plant to Wishlist</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

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
