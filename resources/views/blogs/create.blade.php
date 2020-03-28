@extends('ui.layouts.app')
@section('content')
<form action="{{ route('store_blog_path') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Title</label><br>
        <input type="text" name="title">
    </div>

    <div class="form-group" class="form-control">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="file" name="image" class="form-control" id="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Post</button>
    </div>
</form>

@endsection
