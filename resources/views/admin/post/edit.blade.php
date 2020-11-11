@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit post</h1>
    <form action="{{route('admin.posts.update', $article->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert title" value="{{$article->title}}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Insert slug" value="{{$article->slug}}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*" placeholder="Insert image" value="{{$article->image}}">
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Insert excerpt" value="{{$article->excerpt}}">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$article->content}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection