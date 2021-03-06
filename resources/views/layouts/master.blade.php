<!DOCTYPE html>
<html>
    <head>
        <title>
            {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
            @yield('title','P3')
        </title>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!--project stylesheet comes last to take precedence-->
        <link href="/css/p4.css" type='text/css' rel='stylesheet'>
        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')
    </head>
    <body class="container-fluid Site">
        @if(Session::get('flash_message') != null)
            <div class='flash_message'>{{ Session::get('flash_message') }}</div>
        @endif
        <header>
            <a href="#content" class="sr-only">skip to content</a>
            <nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!--logo drawn from: https://www.google.com/search?q=thumb&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjUu6zAwMnQAhUF24MKHZKbBbQQ_AUICCgB&biw=1440&bih=726#imgrc=C6y-X-gOe4cneM%3A-->
                  <a class="navbar-brand" href="/"><img alt="Green Thumb" src="/images/GreenThumbLogo90px.png"/></a>
                  <!-- <a class="navbar-brand" href="/">GreenThumb</a> -->
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li><a href="/">Home</a></li>
                        @foreach($gardens as $garden)
                            <!-- limit number of nav buttons, later I will setup a selection so user can pick which gardens will be in nav-->
                            @if($garden == $gardens[0] || $garden == $gardens[1] || $garden == $gardens[2] || $garden == $gardens[3])
                                <li><a href='/gardens/show/{{ $garden->id }}'>{{ $garden->name }}</a></li>
                            @endif
                        @endforeach
                        <li><a href="/logout">Logout</a></li>
                        <!-- <li><a href="/plants">My Plants</a></li>
                        <li><a href="/wishlist">My Wishlist Plants</a></li> -->
                    @else
                        <li><a href="/">Home</a></li>
                        <li><a href="/login">Log in</a></li>
                        <li><a href="/register">Register</a></li>
                    @endif
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
        </header>
        <main id="content" class="Site-content">
            <!-- <section> -->
                {{-- Main page content will be yielded here --}}
                @yield('content')
            <!-- </section> -->
        </main>
        <footer class="footer">
                <p>Created by SamGrise &copy; {{ date('Y') }}. Last Updated: December 14th 2016</p>
        </footer>
        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')
            <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script
          src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jcanvas/16.7.3/jcanvas.js"></script>
        <script src="/js/jcanvas.js"></script>
    </body>
</html>
