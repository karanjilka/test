<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <script>
            var CSRF_TOKEN='{{ csrf_token() }}';
        </script>
    </head>
    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Test</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li><a href="{{url('test/create')}}">Create Product</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

        <div class="container-fluid">
            <div class="content">
                @yield('content')
            </div>
        </div>

        <script src="{{asset('asset/js/jquery-plugins/jquery/jquery.min.js')}}"></script>
        @section('script')
        @show

    </body>
</html>
