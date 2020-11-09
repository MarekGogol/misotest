@extends('layout')

@section('content')
<h1>pridajte clanok</h1>
<hr>

<form method="post" action="{{ action('HomeController@store') }}" class="autoAjax">
    <div class="form-group">
        <label>nazov clanku</label>
        <input name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>obsah clanku</label>
        <textarea name="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>obrazok</label>
        <input name="image" type="file" class="form-control">
    </div>
    <button>Odoslat</button>
</form>

<hr>

@foreach($articles as $article)
    <h2><a href="{{ action('HomeController@show', $article->getSlug()) }}">{{ $article->name }}</a></h2>
    <p>{!! $article->content !!}</p>
    <img src="{{ $article->image->resize(200, 200) }}">
@endforeach
@stop