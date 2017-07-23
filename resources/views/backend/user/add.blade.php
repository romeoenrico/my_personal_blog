@extends('backend.master.layout')

@section('title') Aggiunta Utente @endsection

@section('breadcrumb') Utenti > Aggiunta @endsection

@section('content')

@include ('layouts.successmessage')

    <p>Usa il form di seguito per aggiungere un nuovo utente.</p>



         <form method="POST" action="{{ url('backend/adduser') }}">


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


@endsection