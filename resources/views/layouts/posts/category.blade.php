@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                {{$cat_name}}
            </div>
            <div class="card-body">
        @foreach($posts as $post)

            <div class="post-preview">
                <img src="{{asset('/images/image_coming.jpg')}}" alt="coming soon" style="float:left;max-width:100px;padding:5px;">
                <a href="/posts/{{$post->id}}">
                    <h2 class="post-title">
                        {{$post->post_title}}
                    </h2>
                </a>
                    <p>{{$post->short_description}}</p>

                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on September 24, 2019</p>
            </div>
            <hr>
        @endforeach
            </div>
            </div>
        <!-- Pager -->
        {{--<div class="clearfix">--}}
            {{--<a class="btn btn-primary float-right" href="#">Older Posts →</a>--}}
        {{--</div>--}}
            {{ $posts->links() }}
    </div>
</div>
    @endsection