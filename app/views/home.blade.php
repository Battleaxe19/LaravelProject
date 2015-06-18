@extends('layout.default')
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
		

		.dropdown > a > span.green:before {
		border-left-color: #2dcb73;
		}
		.status-upload form button > i {
		margin-right: 7px;
		}

		<!-- SEARCH STYLE -->
		@import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

		.container { margin-top: 20px; }
		.mb20 { margin-bottom: 20px; } 

		hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
		hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
		hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

		.search-result .thumbnail { border-radius: 0 !important; }
		.search-result:first-child { margin-top: 0 !important; }
		.search-result { margin-top: 20px; }
		.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
		.search-result ul { padding-left: 0 !important; list-style: none;  }
		.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
		.search-result ul li i { padding-right: 5px; }
		.search-result .col-md-7 { position: relative; }
		.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
		.search-result h3 > a,  { color: #248dc1 !important; }
		.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
		.search-result span.plus { position: absolute; right: 0; top: 126px; }
		.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
		.search-result span.plus a:hover { background-color: #414141; }
		.search-result span.plus a i { color: #fff !important; }
		.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
	</style>
@stop

@section('content')
				
<div class="row">					
    <div class="col-md-12">       
        <div class="caption-full">
				<form action="/home" method="post">
					<input type="text" name="search" class="form-control pull-left" style="width: 65%;" placeholder="Begin your search here">
					<input type="submit" class="btn btn-success">
				</form>
			<hr>
			@if(!empty($searchResults))
			<div class="container">

			    <hgroup class="mb20">
					<h1>Search Results</h1>
					<h2 class="lead"><strong class="text-danger">{{$numResults}}</strong> results were found for the search for <strong class="text-danger">{{$search}}</strong></h2>								
				</hgroup>

			    <section class="col-xs-12 col-sm-6 col-md-12">
			    	@foreach($searchResults as $key => $searchResult)
					<hr>
						<article class="search-result row">
							<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
								<h3><a href="{{URL::to('ffls/'.$searchResult->id)}}">{{$searchResult->license_name}}</a></h3>
								<p>{{$searchResult->premise_street}}</p>
								@if(($searchResult->bio) != null)
									<p>{{$searchResult->bio}}</p>
								@else
									<p>This dealer hasn't written a bio yet</p>
								@endif
							</div>
							<span class="clearfix borda"></span>
						</article>		
						@endforeach
				</section>
			</div>
			@endif
		</div>
    </div>
</div>

@stop
  