@extends('layouts.app')

@section('content')
<div class="container">
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
                    <button type="button" class="btn btn-info btn-sm">
                        <a href="{{route('admin.posts.show', $article)}}">View</a>
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-dark btn-sm">Edit</button>
                </div>
                <div>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection