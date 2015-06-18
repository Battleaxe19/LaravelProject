@extends('layout.default')

<!-- <h1>Password Reset</h1>
	<form action="{{ action('RemindersController@postRemind') }}" method="POST">
		<input type="email" name="email">
		<input type="submit" value="Send Reminder">
	</form>-->


@section('content')
    <h1>Send Password Reminder</h1>
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
		{{ Form::open(array('action' => 'RemindersController@postRemind', 'class'=>'form-horizontal', 'fole'=>'form')) }}
			  <p>
				@if(Session::has('status'))
				<div class="alert-box success">
					<h4>{{ Session::get('status') }}</h4>
				</div>
			@endif
		  @if(Session::has('error'))
			<div class="alert-box error">
				<h4>{{ Session::get('error') }}</h4>
			</div>
		@endif
		</p>
			
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="text" value="">
            </div>
          </div>			
			
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input id="btnCreate" type="submit" class="btn btn-primary" value="Send">
            </div>
          </div>
        {{ Form::close()}}
      </div>
  </div>

@stop