@extends('ui.layouts.app')
@section('content')
<form action="{{ route('update_blog_path', ['id' => $blog->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label><br>
        <input type="text" name="title" value="{{$blog->title}}">
    </div>

    <div class="form-group" class="form-control">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" rows="10">{{$blog->content}}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Edit Blog Post</button>
    </div>
</form>

@endsection
