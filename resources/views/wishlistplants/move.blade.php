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
    <h2>Move {{ $wishlistplant->common_name }} to Wishlist</h2>

    <form method='POST' action='/gardens/{{ $garden-> id}}/wishlistplants/move/{{ $wishlistplant->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$wishlistplant->id}}' type='hidden'>

        <div class='form-group'>
            <label>Common Name:</label>
            <input
            size='50'
            type='text'
            id='common_name'
            name='common_name'
            value='{{ old('common_name', $wishlistplant->common_name) }}'
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
                value='{{ old('scientific_name', $wishlistplant->scientific_name) }}'
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
           >{{ old('description', $wishlistplant->description) }}</textarea>

           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>Image</label>
           <input
               type='text'
               id='image'
               name='image'
               value='{{ old('image', $wishlistplant->image) }}'
           >
           <div class='error'>{{ $errors->first('image') }}</div>
        </div>

        <div class='form-group'>
           <label>Success with Plant</label>
           <br>
           <textarea
               cols='100'
               rows='3'
               id='prior_success'
               name='prior_success'
           >{{ old('prior_success', $wishlistplant->prior_success) }}</textarea>

           <div class='error'>{{ $errors->first('prior_success') }}</div>
        </div>

        <div class="form-group">
            <label for='min_zone'>Minimum Zone</label>
            <select id='min_zone' name='min_zone'>
                <option value=null>
                    choose zone
                </option>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}' {{ ($wishlistplant->min_zone == $usda_zone) ? 'SELECTED' : '' }}>
                         {{$usda_zone}}
                     </option>
                 @endforeach
            </select>
           <div class='error'>{{ $errors->first('min_zone') }}</div>
        </div>

        <div class="form-group">
            <label for='max_zone'>Maximum Zone</label>
            <select id='max_zone' name='max_zone'>
                <option value=null>
                    choose zone
                </option>
                @foreach($usda_zones as $usda_zone)
                     <option value='{{ $usda_zone }}' {{ ($wishlistplant->max_zone == $usda_zone) ? 'SELECTED' : '' }}>
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
               value='{{ old('height', $wishlistplant->height) }}'
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
               value='{{ old('bloomtime', $wishlistplant->bloomtime) }}'
           >
           <div class='error'>{{ $errors->first('bloomtime') }}</div>
        </div>

        <div class='form-group'>
           <label>Planted</label>
           <input
               type='text'
               id='planted'
               name='planted'
               value='{{ old('planted', ' ') }}'
           >
           <div class='error'>{{ $errors->first('planted') }}</div>
        </div>

        <?php if ($garden->locations == 0) {
            echo 'no locations were created';
        }?>
        <div class="form-group">
            <label for='location'>Available Locations</label>
            <select id='location' name='location'>
                <option value='0'>
                    choose location
                </option>
                @if ($garden->plants()->count()>0)
                    <?php $options =array(); ?>
                    @foreach ($garden->plants as $plant)
                        @if ($plant->location > 0)
                            <?php $options[] = $plant->location; ?>
                        @endif
                    @endforeach
                    @for ($i = 1; $i <= $garden->locations; $i++)
                        @if (!in_array($i, $options))
                                <option value='{{ $i }}'>
                                    {{ $i }}
                                </option>
                        @endif
                    @endfor
                @else
                    @for ($j = 1; $j <= $garden->locations; $j++)
                        <option value='{{ $j }}'>
                            {{ $j }}
                        </option>
                    @endfor
                @endif
            </select>
           <div class='error'>{{ $errors->first('location') }}</div>
        </div>

        <div class='form-instructions'>
            Common Name is required
        </div>

        <button type="submit" class="btn btn-primary">Move to Plants</button>


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
