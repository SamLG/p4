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
    <h2>Add new plant</h2>

    <form method='POST' action='/plants/create'>

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
           <textarea
               cols='100'
               rows='5'
               id='description'
               name='description'
           >{{ old('description', 'Beautiful plant') }}</textarea>

           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>Success with Plant</label>
           <textarea
               cols='100'
               rows='3'
               id='success'
               name='success'
           >{{ old('description', 'very good') }}</textarea>

           <div class='error'>{{ $errors->first('success') }}</div>
        </div>

        <div class='form-group'>
           <label>Minimum Zone</label>
           <input
               size='2'
               type='text'
               id='min_zone'
               name='min_zone'
               value='{{ old('min_zone', '5') }}'
           >
           <div class='error'>{{ $errors->first('min_zone') }}</div>
        </div>

        <div class='form-group'>
           <label>Maximum Zone</label>
           <input
               size='2'
               type='text'
               id='max_zone'
               name='max_zone'
               value='{{ old('max_zone', '10') }}'
           >
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
           <label>Planted</label>
           <input
               type='text'
               id='planted'
               name='planted'
               value='{{ old('planted', '2016') }}'
           >
           <div class='error'>{{ $errors->first('planted') }}</div>
        </div>

        <div class='form-group'>
           <label>Location</label>
           <input
               type='text'
               id='location'
               name='location'
               value='{{ old('location', '') }}'
           >
           <div class='error'>{{ $errors->first('location') }}</div>
        </div>

        <div class='form-instructions'>
            Common Name is required
        </div>

        <button type="submit" class="btn btn-primary">Add Plant</button>

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
