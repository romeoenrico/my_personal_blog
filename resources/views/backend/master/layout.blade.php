<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Pannello di Amministrazione</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    </head>

    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('dashboard') }}"><b>Pannello di Controllo</b></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articoli <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('backend/articles') }}">Elenco</a></li>
                    <li><a href="{{ url('backend/articles/add') }}">Aggiungi Nuovo</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorie <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('backend/categories') }}">Elenco</a></li>
                    <li><a href="{{ url('backend/categories/add') }}">Aggiungi Nuova</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Utenti <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('backend/indexuser') }}">Elenco</a></li>
                    <li><a href="{{ url('backend/users/add') }}">Aggiungi Nuovo</a></li>
                  </ul>
                </li>
                 @if (Auth::check())

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">  {{ Auth::user()->first_name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <form method="POST" action="{{ action('Backend\SessionsController@destroy') }}">
                      <li><a href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                  </li>
                @else
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Guest <span class="caret"></span></a>
                    </li>
                @endif

              </ul>
            </div>
          </div>
        </nav>

        <div class="col-md-10 col-md-offset-1" style="margin-bottom:50px;">
            <h1>@yield('title')</h1>
            <p>Sei in: <i>@yield('breadcrumb')</i></p>
            <hr/>

            @yield('content')

        </div>

        <nav class="navbar navbar-default navbar-fixed-bottom panel-footer">
          <div class="col-md-10 col-md-offset-1">
            <p>A Very Simple Admin Template / Right to Copy - 2017 / Enrico Romeo</p>
          </div>
        </nav>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>