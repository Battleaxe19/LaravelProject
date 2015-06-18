@extends('layout.default')
@section('navbuttons')
	@if(Auth::check() && Auth::user()->type == 'ffls')
	<li>
		<a href="{{ URL::to('ffls/'.$ffls->id.'/edit') }}">Edit</a>
	</li>
	@endif
@stop
@section('header')
	<style>
		.thumbnail img {
			width: 100%;
		}

		.ratings {
			padding-right: 10px;
			padding-left: 10px;
			color: #d17581;
		}

		.thumbnail {
			padding: 0;
		}

		.thumbnail .caption-full {
			padding: 9px;
			color: #333;
		}

		footer {
			margin: 50px 0;
		}
		
.widget-area.blank {
background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
-webkit-box-shadow: none;
-moz-box-shadow: none;
-ms-box-shadow: none;
-o-box-shadow: none;
box-shadow: none;
}
body .no-padding {
padding: 0;
}
.widget-area {
background-color: #fff;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
float: left;
margin-top: 30px;
padding: 25px 30px;
position: relative;
width: 100%;
}
.status-upload {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
float: left;
width: 100%;
}
.status-upload form {
float: left;
width: 100%;
}
.status-upload form textarea {
background: none repeat scroll 0 0 #fff;
border: medium none;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;
color: #777777;
float: left;
font-family: Lato;
font-size: 14px;
height: 142px;
letter-spacing: 0.3px;
padding: 20px;
width: 100%;
resize:vertical;
outline:none;
border: 1px solid #F2F2F2;
}

.status-upload ul {
float: left;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: left;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: left;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {
border: medium none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #fff;
float: right;
font-family: Lato;
font-size: 14px;
letter-spacing: 0.3px;
margin-right: 9px;
margin-top: 9px;
padding: 6px 15px;
}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
}
		.social {
    margin: 0;
    padding: 0;
}

.social ul {
    margin: 0;
    padding: 5px;
}

.social ul li {
    margin: 5px;
    list-style: none outside none;
    display: inline-block;
}
.social i {
    width: 40px;
    height: 40px;
    color: #FFF;
    background-color: #909AA0;
    font-size: 22px;
    text-align:center;
    padding-top: 12px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    transition: all ease 0.3s;
    -moz-transition: all ease 0.3s;
    -webkit-transition: all ease 0.3s;
    -o-transition: all ease 0.3s;
    -ms-transition: all ease 0.3s;
}

.social i:hover {
    color: #FFF;
    text-decoration: none;
    transition: all ease 0.3s;
    -moz-transition: all ease 0.3s;
    -webkit-transition: all ease 0.3s;
    -o-transition: all ease 0.3s;
    -ms-transition: all ease 0.3s;
}
.social .fa-facebook:hover { /* round facebook icon*/
    background: #4060A5;
}

.social .fa-twitter:hover { /* round twitter icon*/
    background: #00ABE3;
}

.social .fa-google-plus:hover { /* round google plus icon*/
    background: #e64522;
}

.social .fa-github:hover { /* round github icon*/
    background: #343434;
}

.social .fa-pinterest:hover { /* round pinterest icon*/
    background: #cb2027;
}

.social .fa-linkedin:hover { /* round linkedin icon*/
    background: #0094BC;
}

.social .fa-flickr:hover { /* round flickr icon*/
    background: #FF57AE;
}

.social .fa-instagram:hover { /* round instagram icon*/
    background: #375989;
}

.social .fa-vimeo-square:hover { /* round vimeo square icon*/
    background: #83DAEB;
}

.social .fa-stack-overflow:hover { /* round stack overflow icon*/
    background: #FEA501;
}

.social .fa-dropbox:hover { /* round dropbox icon*/
    background: #017FE5;
}

.social .fa-tumblr:hover { /* round tumblr icon*/
    background: #3a5876;
}

.social .fa-dribbble:hover { /* round dribble icon*/
    background: #F46899;
}

.social .fa-skype:hover { /* round skype icon*/
    background: #00C6FF;
}

.social .fa-stack-exchange:hover { /* round stack exchange icon*/
    background: #4D86C9;
}

.social .fa-youtube:hover { /* round youtube icon*/
    background: #FF1F25;
}

.social .fa-xing:hover { /* round xing icon*/
    background: #005C5E;
}

.social .fa-rss:hover { /* round rss icon*/
    background: #e88845;
}

.social .fa-foursquare:hover { /* round foursquare icon*/
    background: #09B9E0;
}

.social .fa-youtube-play:hover { /* round youtube play button icon*/
    background: #DF192A;
}
	</style>
@stop

@section('content')

		@if(empty($ffls->user_id))
		<div class="text-right">
			<a class="btn btn-default" href="{{ URL::to('ffls/create') }}?id={{$ffls->id}}">Claim this page</a>
		</div>
		@endif
		<h1 class="pull-left">
			{{(empty($ffls->business_name) || $ffls->business_name == 'NULL')?$ffls->license_name:$ffls->business_name}}
		</h1>
		<div class="social pull-right">
			<ul>
				<li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-lg fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-lg fa-flickr"></i></a></li>
			</ul>
		</div>		
        <div class="row">		
           <!-- <div class="col-md-3">
                <p class="lead"></p>
                 <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div> 
            </div>-->
			<div class="col-md-12" ">
				<iframe style="width:100%; height:100%; min-height:300px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{urlencode($ffls->premise_street.' '.$ffls->premise_city.' '.$ffls->premise_state. ' '.$ffls->premise_zip_code)}}&key=AIzaSyBixaCzN-MMdiPaEpTWDIeW27O8pdJ7qxw">
					</iframe>
			</div>
			
            <div class="col-md-12">

                <div class="thumbnail">
<!--                     <img  src="http://placehold.it/800x300" alt=""> -->			
                    <div class="row caption-full">
						<div class=" col-md-4">
							<h4> <a href="#">{{$ffls->premise_street.' '.$ffls->premise_city.' '.$ffls->premise_state. ' '.$ffls->premise_zip_code}}</a></h4>
							<div class="">
								<h5>Phone: {{$ffls->phone}} | Email: {{$user->email}}</h5> 
								<h5>Fax: {{$ffls->fax}}</h5> 
								@if(($ffls->website) != null)
								<h5> Website: {{$ffls->website}}</h5>
								@else
								<h5> Website: <i>no website</i></h5>
								@endif
								@if(!empty($ffls->transfer_fee))
								<h5> Accepts Transfers?: {{$ffls->transfer_fee}}</h5>
								@else
								<h5> Accepts Transfers?: N/A</h5>
								@endif
								<h5> FFL Lic. Type: {{$ffls->lic_type}}</h5>
								<h5> FFL Expiration date: {{$ffls->lic_xprdte}}</h5>
							</div>	
						</div>                        
                        <div class="col-md-8">
							<div class="row" style="height:50px;">
								<div class="ratings col-md-10" style="font-size: 2em;">
									@for($i = 0;$i < $rating; $i++)
									<span class="glyphicon glyphicon-star"></span>
									@endfor

									@for($i = 5 - $rating;$i > 0; $i--)
									<span class="glyphicon glyphicon-star-empty"></span>
									@endfor
									{{count($comments)}} reviews

								</div>						
								@if(Auth::check())
								 <div id="btnFavorite" class="col-md-2" style="align:right">
									 @if(Auth::user()->type == 'user' && count($favorite) == 0)
									 {{ Form::open(array('route' => 'favorites.store', 'class'=>'form-horizontal', 'fole'=>'form')) }}
										 <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> Favorite</button>
										 <input type="hidden" name="ffl_id" value="{{$ffls->id}}"/>
									 {{Form::close()}}
									 @endif
								</div>
								@endif
							</div>
							<div>
								<p>{{(empty($ffls->bio))?'A bio has not been recorded for this dealer.':$ffls->bio}}</p>
							</div>
						<div>
						</div>						
						<p> &nbsp </p>
						</div>
                    </div>     
                </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-1" style="max-width:25px;">
	</div>
	<div class="panel panel-default col-md-4">
		<div class="row">
			<div class="col-md-12">
				<h4 class=" col-md-10">
					Deals
				</h4>
				@if(Auth::check() && Auth::user()->type == 'ffls' && Auth::id() == $ffls->user_id)
				<a id="btnAddDeal" onclick="$('#btnAddDeal').hide();$('#addDeal').show();" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Add</a>
				@endif
			</div>
				@if(Auth::check() && Auth::user()->type == 'ffls' && Auth::id() == $ffls->user_id)
			 {{ Form::open(array('route' => 'deals.store', 'class'=>'form-horizontal', 'fole'=>'form')) }}		
			<div id="addDeal" style="display:none;">
				<div class="">
					<input type="text" name='title' class="form-control" placeholder="Enter Title">
					<br />
					<textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
				</div>
				<div  class="col-md-2" style="margin-top:10px;">
					 <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add</button>
					<input type="hidden" name="ffl_id" value="{{$ffls->id}}"/>
				</div>					
			</div>
			 {{Form::close()}}
			@endif			
		</div>
		<hr/>
		@foreach($deals as $key => $deal)
						<div class="row">
							<div class="col-md-12">
								<div class="pull-left">
									<h4>
										<span class="ratings">{{ $deal->title }}</span>
									</h4>
									@if(Auth::check() && Auth::user()->type == 'ffls' && Auth::id() == $ffls->user_id)
								{{ Form::open(array('url' => 'deals/'.$deal->id, 'class'=>'form-horizontal', 'fole'=>'form', 'method' => 'delete')) }}
								<span class="pull-right">
									<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
								</span>
								{{Form::close()}}
								@endif
									<p>{{$deal->description}}</p>
								</div>
								
							</div>
						</div>

						<hr />
						@endforeach
	</div>
	<div class="col-md-1" style="max-width:25px;">
	</div>
		<div class="panel panel-default col-md-7">
			<h4>
				User Reviews
			</h4>
			<hr/>
	@if(Auth::check() && Auth::user()->type == 'user')

		<div id="commentbox" class="row" style="display:none;">    
			<div class="col-md-12">
				<div class="widget-area no-padding blank">
					<div class="status-upload">
						{{ Form::open(array('route' => 'comments.store', 'class'=>'form-horizontal', 'fole'=>'form', 'method'=>'post')) }}
							<textarea name="comment" placeholder="Enter comments here and click post!" ></textarea>
						Rating
						<select name="rating">
							<option value="5" selected>5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
							<input type="hidden" name="fflsid" value="{{$ffls->id}}" />
							<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Post</button>
						{{ Form::close()}}
					</div><!-- Status Upload  -->
				</div><!-- Widget Area -->
			</div>        
		</div>
		<div id="btnReview" class="text-right">
			<a class="btn btn-success" onclick="$('#btnReview').hide();$('#commentbox').show();">Leave a Review</a>
		</div>
	@endif
						<hr>
					@if(count($comments) == 0)
						<div class="row">
							<div class="col-md-12">
								 <p>Log in and be the first to leave a review!</p>
							</div>
						</div>
						<hr>
					@else
						@foreach($comments as $key => $comment)
						<div class="row">
							<div class="col-md-12">
								<div class="ratings pull-left">
									@for($i = 0;$i < $comment->rating; $i++)
									<span class="glyphicon glyphicon-star "></span>
									@endfor

									@for($i = 5 - $comment->rating;$i > 0; $i--)
									<span class="glyphicon glyphicon-star-empty"></span>
									@endfor
								</div>
								<a href="{{URL::to('user/'.$comment->user_id)}}">{{$comment->getUsername()}}</a>
								<span class="pull-right">{{ date("d F Y",strtotime($comment->created_at)) }}</span>
								<p>{{$comment->comment}}</p>
							</div>
						</div>

						<hr>
						@endforeach
					@endif
					</div>

				</div>

			</div>
	
</div>
@stop
  