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
            Edit Category
        </div>
        <div class="card-body">

            {!! Form::open(['action' => ['CategoriesController@update',$category->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            @csrf
            <div class="form-group">
                <label for="category_nameLabel">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name"
                       aria-describedby="category_name" value="{{$category->category_name}}">
            </div>
            <div class="form-group">
                <label for="parent_idLabel">Parent Category?</label>
                {{Form::select('parent_id', $category, $category->parent_id, array('class'=>'form-control','id'=>'parent_id'))}}
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection