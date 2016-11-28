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
        <!--project stylesheet comes last to take precedence-->
        <link href="/css/p4.css" type='text/css' rel='stylesheet'>
        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')
    </head>
    <body>
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
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/gardens">My Gardens</a></li>
                    <!-- <li><a href="/plants">My Plants</a></li>
                    <li><a href="/wishlist">My Wishlist Plants</a></li> -->
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
        </header>
        <main id="content">
            <section>
                {{-- Main page content will be yielded here --}}
                @yield('content')
            </section>

        </main>
        <footer>
            <p>Created by SamGrise &copy; {{ date('Y') }}. Last Updated: November 27th 2016</p>
        </footer>
        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')
            <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>
