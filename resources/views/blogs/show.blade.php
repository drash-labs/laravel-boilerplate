@extends('ui.layouts.app')
@section('content')
<div class="row">

    <div class="col-md-12">
        <br>
        <img src="{{asset($single_blog->image)}}" alt="" class="card-img-top">
        <br><br>
        <h3>{{$single_blog->title}}</h3>
        <br>
        <p class="lead">
            {{$single_blog->content}}
        </p>

        <a href="{{route('edit_blog', ['id' => $single_blog->id])}}" class="btn btn-outline-info">Edit</a>
        <a href="{{route('blogs', ['id' => $single_blog->id])}}" class="btn btn-outline-secondary">Back</a>
        <br><br>
        <form action="{{route('delete_blog_path', ['id' => $single_blog->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>

        </form>

    </div>


</div>



@endsection
