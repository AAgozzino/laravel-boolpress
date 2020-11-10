@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create new post</h1>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert title">
        </div>
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Insert excerpt">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="contetnt" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Insert slug">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection