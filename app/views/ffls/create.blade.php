@extends('layout.default')

@section('header')
<script type="text/javascript">
	$(document).ready(function(){
		$('.form-control').keyup(checkFields);
	});
	
	function checkFields(){
		var allFilled = true;
		$('.form-control').each(function(){
			var val = $(this).val();
			if(val == '' || val == undefined){
				allFilled = false;
			}
		});
		if($('#password1').val() != $('#password2').val()){
			allFilled = false;
			$('#passwordalert').show();
		}else{
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
    <h1>Claim Profile - {{(empty($ffls->business_name) || $ffls->business_name == 'NULL')?$ffls->license_name:$ffls->business_name}}</h1>
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
		{{ Form::open(array('route' => 'ffls.store', 'class'=>'form-horizontal', 'fole'=>'form')) }}
<!--           <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input name="name" class="form-control" type="text" value="">
            </div>
          </div> -->
			
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
              <input id="btnCreate" type="submit" class="btn btn-primary" value="Claim" disabled>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
		  <input type="hidden" name="id" value="{{$ffls->id}}"/>
        {{ Form::close()}}
      </div>
  </div>
</div>
@stop