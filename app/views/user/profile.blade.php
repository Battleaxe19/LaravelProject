@extends('layout.default')
@section('navbuttons')
	@if(Auth::check() && Auth::user()->type == 'user')
	<li>
		<a href="{{ URL::to('user/'.Auth::id().'/edit') }}">Edit</a>
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
	</style>
@stop

@section('content')
        <div class="row">

            <div class="col-md-12">
                <p class="lead">
					<h1>{{$user->name}}	</h1>
				</p>
            </div>

            <div class="col-md-12 centered">

                    <div class="caption-full">
                        <h4 class="pull-right"></h4>
                        <span><h4>Email: {{$user->email}}</h4></span>
                    </div>

				<div class="panel panel-default col-md-4">
					<h3>
						<span class="label label-default">Favorites</span>
					</h3>
					
                    <hr>
                   @foreach($favorites as $key => $favorite)
                    <div class="row">
                        <div class="col-md-12">
							<div class="ratings pull-left">
								<h4>
									<a href="{{URL::to('ffls/'.$favorite->ffl_id)}}">{{$favorite->getFFLname()}}</a>
								</h4> 
							</div>
							
							@if(Auth::check() && $user->id == Auth::id())
								{{ Form::open(array('url' => 'favorites/'.$favorite->id, 'class'=>'form-horizontal', 'fole'=>'form', 'method' => 'delete')) }}
								<span class="pull-right">
									<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
								</span>
								{{Form::close()}}
							@endif
						</div>
                    </div>

                    <hr>
					@endforeach
            	</div>
				<div class="col-md-1"></div>
                <div class="panel panel-default col-md-6">
					<h3>
						<span class="label label-default">Comment History</span>
					</h3>
                    <hr>
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
                            <a href="{{URL::to('ffls/'.$comment->ffl_id)}}">{{$comment->getFFLname()}}</a>
                            <span class="pull-right">{{ date("d F Y",strtotime($comment->created_at)) }}</span>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>

                    <hr>
					@endforeach

					</div>					
				
        </div>

@stop