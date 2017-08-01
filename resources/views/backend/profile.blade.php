@extends('backend.master.layout')

@section('title') Pannello di Controllo @endsection

@section('breadcrumb') Pannello di Controllo -> Dashboard -> Profile @endsection

@section('content')
        <br>
        <div class="row">

                <img src={{ asset('uploads/avatars') . "/" . Auth::user()->avatar }} style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px; ">
                <h2>{{Auth::user()->first_name}}'s Profile</h2>

                <form enctype="multipart/form-data" action="{{ action('Backend\SessionsController@update_avatar')}}" method="POST">

                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">

                </form>
        </div>




@endsection