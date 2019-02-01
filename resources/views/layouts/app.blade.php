<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item {{ request()->segment(1) === '' || (request()->segment(1) === 'blog' && request()->segment(2) == '')  ? 'active' : '' }}">
            <a class="nav-link" href="/blog">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ request()->segment(1) === 'blog' && request()->segment(2) === 'create' ? 'active' : '' }}">
            <a class="nav-link" href="/blog/create">Create</a>
          </li>
          @if (config('app.env') === 'local')
          <li class="nav-item {{ request()->segment(1) === 'data' && request()->segment(2) === 'push' ? 'active' : '' }}">
            <a class="nav-link" href="/data/push" onclick="return confirm('Confirm to sync data!');">Push Data</a>
          </li>
          @endif
        </ul>
      </div>
      </div>
    </nav>

    <div class="container" style="margin-top: 80px;">
      <p>
        @include ('layouts.partials.flash-message')
      </p>
      @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </body>
</html>
