@extends('layout.default')

@section('header')
<script type="text/javascript">
	$(document).ready(function(){
		$('.form-control').keyup(checkFields);
	});
	
	function checkFields(){
		var allFilled = true;
/* 		$('.required').each(function(){
			var val = $(this).val();
			if(val == '' || val == undefined){
				//allFilled = false;
			}
		}); */
		if($('#password1').val() != $('#password2').val()){		
			allFilled = false;
			$('#passwordalert').show();
		}else{
			allFilled = true;
			$('#passwordalert').hide();
		}
		if(allFilled){
			$('#btnCreate').removeAttr('disabled');
		}else{
			$('#btnCreate').attr('disabled',true);
		}
	}
</script>
@stop

@section('content')
    <h1>Edit Profile</h1>
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
		{{ Form::open(array('url' => 'ffls/'.Auth::id(),'method' => 'put', 'class'=>'form-horizontal', 'fole'=>'form')) }}
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input name="name" class="form-control" type="text" value="{{$user->name}}">
            </div>
          </div>
			
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="email" value="{{$user->email}}">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input name="phone" class="form-control" type="text" value="{{$ffls->phone}}">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Fax:</label>
            <div class="col-lg-8">
              <input name="fax" class="form-control" type="text" value="{{$ffls->fax}}">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Website:</label>
            <div class="col-lg-8">
              <input name="website" class="form-control" type="text" value="{{$ffls->website}}">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Accept Transfers?:</label>
            <div class="col-lg-2">
              <select name="transfers" class="form-control" type="text" value="{{$ffls->accept_transfers}}">
				  <option value="Y">Yes</option>
				  <option value="C">Yes, please call</option>
				   <option value="N">No</option>
				</select>
            </div>
		  	<div class="col-lg-6">				
              <input name="transfers_fee" class="form-control" type="text" placeholder="Fee Amount" value="">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Bio:</label>
            <div class="col-lg-8">
              <textarea name="bio" class="form-control" type="text">{{$ffls->bio}}</textarea>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8 alert alert-info">
				 Fill in the following fields to change your password, otherwise leave them blank.
			</div>
          </div>			
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input id="password1" name="password" class="form-control" type="password" value="">
            </div>
          </div>
			
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input id="password2" class="form-control" type="password" value="">
            </div>
          </div>
		<div class="form-group">
            <label class="col-md-3 control-label"></label>	
				<div id="passwordalert" class="col-md-8 alert alert-danger" role="alert" style="display:none;">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<!-- 		  <span class="sr-only">Error:</span> -->
				  Passwords don't match
				</div>
			</div>
			
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input id="btnCreate" type="submit" class="btn btn-primary" value="Update">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        {{ Form::close()}}
      </div>
  </div>
</div>
@stop