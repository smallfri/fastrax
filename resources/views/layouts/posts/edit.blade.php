@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">

            {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label for="post_titleLabel">Post Title:</label>
                <input type="text" class="form-control" name="post_title" id="post_title" aria-describedby="post_title"
                       value="{{$post->post_title}}">
            </div>
            <div class="form-group">
                <label for="category_idLabel">Category</label>
                {{Form::select('category_id[]', $category, $categoriesSelected, ['multiple'=>'multiple', 'class'=>'form-control','id'=>'category_id'])}}
            </div>
            <div class="form-group">
                <label for="short_description_Label">Post Title:</label>
                <textarea class="form-control" name="short_description" id="short_description"
                          aria-describedby="short_description">{{$post->short_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="long_description_Label">Post Title:</label>
                <textarea class="form-control" name="long_description" id="long_description"
                          aria-describedby="long_description">{{$post->long_description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection