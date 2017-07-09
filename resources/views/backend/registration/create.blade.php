<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>

  <body>
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>Register <small>Register in our site</small></h1>
                </div>

                <p class="lead">this is a great site</p>

                 <!-- <form method="POST" action="register"> -->
                 <form method="POST" action="{{ action('Backend\RegistrationController@store') }}">

                  {{csrf_field()}}

                  <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Your Name" required>
                    <!--<input type="text" class="form-control" id="name" name="name"> -->
                  </div>

                   <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('first_name') }}" placeholder="Your Surname" required>
                    <!--<input type="text" class="form-control" id="name" name="name"> -->
                  </div>

                  <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                    <!--<input type="email" class="form-control" id="email" name="email">-->
                  </div>

                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Your Password" required>
                    <!--<input type="password" class="form-control" id="password" name="password">-->
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Your Password Confirmation" required>
                    <!--<input type="password" class="form-control" id="password" name="password">-->
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>

                  @include ('layouts.errors')

                </form>

            </div>
        </div>
      </div>
 </body>
