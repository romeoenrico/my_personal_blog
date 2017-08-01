@extends('backend.master.layout')

@section('title') Pannello di Controllo @endsection

@section('breadcrumb') Pannello di Controllo -> Dashboard @endsection

@section('content')
    <p>Benvenuto {{ Auth::user()->first_name }} ! Scegli cosa vuoi fare usando il menu qui in alto.</p>

    <p>Currently you have:</p>

    <ul class="list-group">
		  <li class="list-group-item">Articoli <span class="badge">{{ Auth::user()->articles()->count() }}</span></li>
	</ul>

    <br>
    <br>

    <form action="{{ action('Backend\SessionsController@destroy') }}" method="POST" accept-charset="utf-8">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <div class="form-group">
	            <button type="submit" class="btn btn-danger">Log Out</button>
	        </div>
    </form>


    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu
        <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('dashboard/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a><li>
          </ul>
    </div>

@endsection