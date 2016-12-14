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
    <h2>Add new garden</h2>

    <canvas width="620" height="441" id="canvas1"></canvas>

    <form method='POST' action='/gardens/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Name</label>
            <input
                size='50'
                type='text'
                id='name'
                name='name'
                value='{{ old('name', 'Side Garden') }}'
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
                value='{{ old('location', 'Side of house') }}'
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
           >{{ old('description', 'lovely garden') }}</textarea>

           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>Created</label>
           <input
               type='text'
               id='created'
               name='created'
               value='{{ old('created', '') }}'
           >
           <div class='error'>{{ $errors->first('created') }}</div>
        </div>

        <div class="form-group">
            <label for='zone'>USDA Zones</label>
            <select id='zone' name='zone'>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}'>
                         {{$usda_zone}}
                     </option>
                 @endforeach
            </select>
           <div class='error'>{{ $errors->first('zone') }}</div>
        </div>

        <div class='form-group'>
           <label>Garden Plan</label>
           <input
               type='text'
               id='image'
               name='image'
               value='{{ old('image', 'http://teaone.net/uploads/fotos/how-to-design-your-backyard-landscape_989_900_696.jpg') }}'
           >
           <div class='error'>{{ $errors->first('image') }}</div>
        </div>

        <div class='form-instructions'>
            Name is required
        </div>

        <button type="submit" class="btn btn-primary">Add Garden</button>

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
    <script
              src="http://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
	<script src="js/jcanvas.min.js"></script>
    <script src="js/jcanvas.js"></script>
@stop
