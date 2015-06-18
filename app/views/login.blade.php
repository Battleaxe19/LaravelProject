@extends('layout.default')
@section('header')
<title>Login</title>
@stop
<!-- 

<!-- {{ Form::open(array('url' => 'login')) }}
<h1>Login</h1>

<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}
	<a href="{{ URL::to('password/remind') }}">Password Reminder</a> 
-->


@section('content')
    <h1>Login</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-12 personal-info">
<!--         <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> 
        <h3>Personal info</h3>-->
        
<!--         <form class="" role="form" action="{{ URL::to('user') }}"> -->
		{{ Form::open(array('url' => 'login', 'class'=>'form-horizontal', 'fole'=>'form')) }}
		  <p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>
			
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="text" value="">
            </div>
          </div>
			
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input id="password1" name="password" class="form-control" type="password" value="">
            </div>
          </div>
			
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input id="btnCreate" type="submit" class="btn btn-primary" value="Login">
              <span></span>
				<a href="{{ URL::to('password/remind') }}">
              		<input type="button" class="btn btn-default" value="Password Reminder">
				</a>
            </div>
          </div>
        {{ Form::close()}}
      </div>
  </div>

@stop