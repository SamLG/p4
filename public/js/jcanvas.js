/**
 * This js file add functionality to coffe.samgrise.me for form validation,
 * interaction, and virtual-barrista
 *
 * @author Sam Grise
 * @version Last modified 12_13_16
**/
$(document).ready(function(){

    setImage($('#image').val());
    add_plan();

    $('canvas').hover(function(){
        add_plan();
    });
    $('canvas').mousemove(function(){
        add_plan();
    });

    function setImage(image){
        var value = image;
        //url treated as obj we want it as a string for setting backgroun-image
        var stringy = String(value);
        $('canvas').css('background-image', "url(" + stringy + ")").css('background-size', '300px 300px');
    }

    function add_plan()
    {
        var canvas = document.getElementById('myCanvas'),
        context = canvas.getContext('2d');
        //for show and edit, need to grab prior plan as overlay
        var planImageSRC = $('#planImage').val();
        //need to keep track of how many locations were created
        var plan_image = new Image();
        plan_image.src = planImageSRC;
        plan_image.onload = function(){
            context.drawImage(plan_image, 0, 0, 300, 300);
        }
    }

    var locations = 0;
    // if locations has value then want to start count there
    if ($('#locations').val() > 0) {
        locations = $('#locations').val();
    }
    $('#addLocationBTN').click(function(){
        locations++;
		$('canvas').drawText({
			fillStyle: 'darkred',
			strokeStyle: 'white',
			strokeWidth: 1,
			x: 50,
			y: 50,
			fontSize: '2em',
			fontFamily: 'Impact, sans-serif',
			text: locations,
            draggable: true,
		});
        // alert(locations);
	});

    // alert(locations);

    $('#saveCanvas').click(function(){
        $('#locations').val(locations);
        var canvas = document.getElementById('myCanvas');
        var dataURL = canvas.toDataURL();
        // var stringyCanvas = String(dataURL);
        $('#planImage').val(dataURL);
    });

    // clear the canvas
    $('#clearCanvas').click(function(){
        clearMe();
    });

    function clearMe (){
        $('canvas').clearCanvas();
        // make sure nothing is saved
        $('#planImage').val(' ');
        $('#locations').val(0);
        planImageSRC = '';
        locations = 0;
    }

    $('#image').change(function(){
        clearMe();
        setImage($('#image').val());
    });

});//end doc ready
