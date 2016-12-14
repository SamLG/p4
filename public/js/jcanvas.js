/**
 * This js file add functionality to coffe.samgrise.me for form validation,
 * interaction, and virtual-barrista
 *
 * @author Sam Grise
 * @version Last modified 12_13_16
**/
$(document).ready(function(){
    $('h2').click(function(){
		console.log('Test!');
		alert('Testing!');
	}); //end apple click
    // $('canvas').drawRect({ //background color
    //     fillStyle: 'lightgrey',
    //     x: 250, y: 175,
    //     width: 500,
    //     height: 350
    // });
    // var c = document.getElementById("myCanvas");
    // var ctx = c.getContext("2d");
    // var img = new Image();
    // img.onload = function() {
    //     ctx.drawImage(img, 0, 0, 300, 300);
    // };
    // img.src = $('#image').val();
    //
    var clickCount = 0;
    //
    // // helper function to get an element's exact position
    // // function getPosition(el) {
    // //   var xPosition = 0;
    // //   var yPosition = 0;
    // //
    // //   while (el) {
    // //     if (el.tagName == "BODY") {
    // //       // deal with browser quirks with body/window/document and page scroll
    // //       var xScrollPos = el.scrollLeft || document.documentElement.scrollLeft;
    // //       var yScrollPos = el.scrollTop || document.documentElement.scrollTop;
    // //
    // //       xPosition += (el.offsetLeft - xScrollPos + el.clientLeft);
    // //       yPosition += (el.offsetTop - yScrollPos + el.clientTop);
    // //     } else {
    // //       xPosition += (el.offsetLeft - el.scrollLeft + el.clientLeft);
    // //       yPosition += (el.offsetTop - el.scrollTop + el.clientTop);
    // //     }
    // //
    // //     el = el.offsetParent;
    // //   }
    // //   return {
    // //     x: xPosition,
    // //     y: yPosition
    // //   };
    // // }
    //
    $('#addLocationBTN').click(function(){
        // getPosition(e);
        // var positions = getPosition();
        // var x = positions.x;
        // var y = positions.y;
        clickCount++;
		$('canvas').drawText({
			fillStyle: 'darkred',
			strokeStyle: 'white',
			strokeWidth: 1,
			x: 50,
			y: 50,
			fontSize: '2em',
			fontFamily: 'Impact, sans-serif',
			text: clickCount,
            draggable: true,
		});
	});

    var dataURL = canvas.toDataURL('image/png');
    $.ajax({
      type: "POST",
      url: "script.php",
      data: {
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log('saved');
      // If you want the file to be visible in the browser
      // - please modify the callback in javascript. All you
      // need is to return the url to the file, you just saved
      // and than put the image in your browser.
    });
//end button1 click
    // function drawIt(xPos,yPos) {
    //     $('canvas').drawText({
    //         fillStyle: 'darkred',
    //         strokeStyle: 'white',
    //         strokeWidth: 1,
    //         x: 50,
    //         y: 50,
    //         fontSize: '2em',
    //         fontFamily: 'Impact, sans-serif',
    //         text: clickCount,
    //     });
    // }
    //
    // $('canvas').click(function(e){
    //      var rect = canvas.getBoundingClientRect();
    //      var x = e.clientX - rect.left;
    //      var y = e.clientY - rect.top;
    //      alert('hello');
    //      drawIt(x,y);
    // }
});//end doc ready
