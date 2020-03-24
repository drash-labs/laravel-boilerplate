@extends('ui.layouts.app')
@section('content')
<div class="row">
    @foreach ($blogs as $blog)
    <div class="col-md-6">
        <br><br>
        <div class="card">
            <div class="card-header">
                <a href="{{route('blog_path', ['id' => $blog->id])}}">{{$blog->title}}</a>
            </div>

            <div class="card-body">
                <a href="{{route('blog_path', ['id' => $blog->id])}}">
                    <img src="{{asset($blog->image)}}" alt="" class="card-img-top">
                </a>

                {{-- {{$blog->content}} --}}
                <br>
                <br>
                <br>
                <p class="lead">
                    Posted {{$blog->created_at->diffForHumans()}}.
                </p>
                <a href="{{route('blog_path', ['id' => $blog->id])}}"><button class="btn btn-outline-primary">View
                        Post</button></a>

            </div>
        </div>



    </div>
    @endforeach
</div>


@endsection
