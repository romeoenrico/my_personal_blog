@extends('frontend.master.layout')

@section('title') 404 @endsection

@section('content')

<style>
*{
    transition: all 0.6s;
}

#main404{
    display: table;
    width: 100%;
    height: 100vh;
    text-align: center;
}

.fof{
	  display: table-cell;
	  vertical-align: middle;
}

.fof h1{
	  font-size: 50px;
	  display: inline-block;
	  padding-right: 12px;
	  animation: type .5s alternate infinite;
}

@keyframes type{
	  from{box-shadow: inset -3px 0px 0px #888;}
	  to{box-shadow: inset -3px 0px 0px transparent;}
}
</style>


    <div class="page-container float-right">

      <div id="main404">
          	<div class="fof">
              		<h1>Error 404</h1>
          	</div>
      </div>

    </div><!-- end: page-container-->



@endsection
