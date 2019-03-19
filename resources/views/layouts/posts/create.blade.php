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
            Create Post
        </div>
        <div class="card-body">

            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label for="post_titleLabel">Post Title:</label>
                <input type="text" class="form-control" name="post_title" id="post_title" aria-describedby="post_title"
                       placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="category_idLabel">Category</label>
                {{Form::select('category_id[]', $category, 0, ['multiple'=>'multiple', 'class'=>'form-control','id'=>'category_id'])}}
            </div>
            <div class="form-group">
                <label for="short_description_Label">Short Description:</label>
                <textarea class="form-control" name="short_description" id="short_description"
                          aria-describedby="short_description" placeholder="Short Description"></textarea>
            </div>
            <div class="form-group">
                <label for="long_description_Label">Long Description:</label>
                <textarea class="form-control" name="long_description" id="long_description"
                          aria-describedby="long_description" placeholder="Long Description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection