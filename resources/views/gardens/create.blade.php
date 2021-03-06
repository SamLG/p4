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
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <h2>Add new garden</h2>

            <form method='POST' action='/gardens/create'>

                {{ csrf_field() }}
                <!-- hidden inputs to store data from canvas -->
                <input name='planImage' id='planImage' value='' type='hidden'>
                <input name='locations' id='locations' value='0' type='hidden'>

                <div class='form-group'>
                   <label>Name</label>
                    <input
                        size='50'
                        type='text'
                        id='name'
                        name='name'
                        value='{{ old('name', '') }}'
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
                        value='{{ old('location', '') }}'
                    >
                   <div class='error'>{{ $errors->first('location') }}</div>
                </div>


                <div class='form-group'>
                   <label>Description</label>
                   <br>
                   <textarea
                       cols='70'
                       rows='5'
                       id='description'
                       name='description'
                   >{{ old('description', '') }}</textarea>

                   <div class='error'>{{ $errors->first('description') }}</div>
                </div>

                <div class='form-group'>
                   <label>When was the Garden Created</label>
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
                        <option value=null>
                            choose zone
                        </option>
                        @foreach($usda_zones as $usda_zone)
                             <option value='{{ $usda_zone }}'>
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
        </div>
        <div class="planCreation col-xs-12 col-md-4">
            <h3>Your Garden Plan</h3>
            <p>Upload an image in the form.<br>'Add Location' and drag to its position.<br>'Save Plan' before creating your garden <br> or start again with 'Clear Plan'</p>
            <canvas width="300" height="300" id="myCanvas"></canvas>
            <br>
            <button id="addLocationBTN">Add Location</button>
            <button id="saveCanvas">Save Plan</button>
            <button id="clearCanvas">Clear Plan</button>
        </div>
    </div>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
