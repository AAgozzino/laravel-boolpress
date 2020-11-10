@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <div>
            <h2>Excerpt</h2>
            <p>{{$article->excerpt}}</p>
        </div>
        <div>
            <img src="{{asset('storage/' . $article->image)}}" alt="">
        </div>
        <div>
            <h2>Content</h2>
            <p>{{$article->content}}</p>
        </div>
    </div>
@endsection

