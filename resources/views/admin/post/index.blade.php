@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-outline-primary mb-3">
        <a href="{{route('admin.posts.create')}}">New post</a>    
    </button>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)    
            <tr>
            <th>{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->excerpt}}</td>
            <td>{{$article->slug}}</td>
            <td>
                <div>
                    <a href="{{route('admin.posts.show', $article)}}">View</a>
                </div>
                <div>
                    <a href="{{route('admin.posts.edit', $article)}}">Edit</a>
                </div>
                <div>
                    <form action="{{route("admin.posts.destroy", $article)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <input type="submit" value="Delete">
                        </form>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection