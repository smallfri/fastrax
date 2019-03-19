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
            {{$posts->post_title}}
        </div>
        <div class="card-body">
            <img src="{{asset('/images/image_coming.jpg')}}" alt="coming soon" style="float:left;max-width:100px;padding:5px;">

            <p>{{$posts->long_description}}</p>

        </div>
    </div>
@endsection