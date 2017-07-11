@extends('layouts.app')
@section('content')
	<div class="container-fluid">
	<div class="row">
	<div class="col-sm-9">
		<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
			<article class="row">
	<div>
		<div class="col-sm-12">
			<header>
				<h5>{!! $new->title !!}</h5>		
				</header><!-- .entry-header -->
			<div>
				{!! $new->content !!}</div>
				<div>
					<div> 
						<span class="glyphicon glyphicon-user"> Post: {!! $new->user->name !!}</span>
						<span class="glyphicon glyphicon-calendar"> On: {!! $new->created_at!!}</span>
						<span class="glyphicon glyphicon-folder-open"> Category: {!! $new->newsCategory->name !!}</span>				
					</div>
				</div>		
			</div>
	</div>
	</article>	
	</div>
	<div class="col-sm-3">
		<aside>
			
			<h5>Danh mục</h5>
			<div class="list-group">

			@foreach($categories_badges as $categories_badge)
				<a href="{{ url('news/'.$categories_badge->newsCategory->alias) }}" class="list-group-item">{!! $categories_badge->newsCategory->name !!}<span class="badge">{{ $categories_badge->categories_badge_count }}</span></a>
			@endforeach
</div>
		</aside>
	</div>				
	</div>
	</div>
@endsection