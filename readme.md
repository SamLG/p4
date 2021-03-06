# Project 4 dwa15

## Live URL
<http://greenthumb.samgrise.me/>

## Description
A site that allows you to create and manage gardens. In those gardens you can also create and manage plants and a wishlist. You are able to create a garden plan with an image and drawing locations for plants, then you can choose plants for those locations. The site uses Laravel framework, bootstrap, forms, jQuery, and jcanvas.

## Demo
<https://youtu.be/PeeB4GjPuqo>

## Details for teaching team
Jill has all of the gardens and plants. In all my coding with jCanvas on this and other projects... I have found jCanvas to be quite buggy in respect to clearing. Unfortunately, my clear button is only temporarily clearing my canvas of recently drawn locations... if the canvas is hovered over they reappear... I know this is a canvas bug, because I edited out any code that would draw those locations back and it still did. Another professor in a different class agreed jCanvas is buggy.

## Outside code
* figured out custom error in part with http://stackoverflow.com/questions/28793716/how-add-custom-validation-rules-when-using-form-request-validation-in-laravel-5
* dynamically populated nav adapted from  https://laracasts.com/series/laravel-5-fundamentals/episodes/25
* add_plan function in jcanvas.js adapted from http://stackoverflow.com/questions/6011378/how-to-add-image-to-canvas
* background image from http://www.publicdomainpictures.net/view-image.php?image=42539&picture=fresh-green-leaves
* all other images used are used via url, so source is available
* Bootstrap: http://getbootstrap.com/css/#overview
* Bootstrap cdn: https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js
* ie10-viewport-bug-workaroung.js is from Bootstrap
* https://code.jquery.com/jquery-3.1.1.min.js
* https://cdnjs.cloudflare.com/ajax/libs/jcanvas/16.7.3/jcanvas.js
* Laravel PHP Framework
* css code to make footer sticky flexbox https://philipwalton.github.io/solved-by-flexbox/demos/sticky-footer/
* css code for screen reader only styling http://webaim.org/techniques/css/invisiblecontent/
