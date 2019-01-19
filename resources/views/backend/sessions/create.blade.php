<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                @if (!Auth::check())
                <div class="page-header">
                    <h1>Hei Guest <small>Sign In our site</small></h1>
                </div>
                @else
                  <div class="page-header">
                    <h1>Hei {{ Auth::user()->first_name }} <small>Sign In in our site</small></h1>
                </div>
                @endif
                <p class="lead">this is a great site</p>

                <form method="POST" action="{{ action('Backend\SessionsController@store') }}">
                  {{csrf_field()}}

                  <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Your Email" required>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>

                  @include('layouts.errors')

                </form>

              </div>
          </div>
        </div>
    </body>
</html>
