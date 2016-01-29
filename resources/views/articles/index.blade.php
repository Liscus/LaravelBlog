@extends('app')

@section('content')
	<h1>All Articles</h1>
	<hr>

	@foreach($articles as $article)
		<article>
			<a href="{{ action('ArticlesController@show', [$article->id]) }}"><h2>{{ $article->title }}</h2></a>
		</article>
	@endforeach
@stop