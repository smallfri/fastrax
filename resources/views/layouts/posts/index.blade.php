@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Post
        </div>
        <div class="card-body">

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th class="index">Post ID</th>
                    <th>Post Title</th>
                    <th>Categories</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>
                            <?php $i = 1;?>
                            @foreach($post->category as $cat)
                                {{$cat->category_name}}@if(count($post->category) !== $i),@endif
                                    <?php $i++;?>
                            @endforeach
                        </td>
                        <td>
                            <a href="/posts/{{$post->id}}/edit">
                                {!! FA::icon('edit') !!}
                            </a>
                            |
                            <a href="/posts/{{$post->id}}/delete">
                                {!! FA::icon('trash') !!}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                }, {
                    targets: [1],
                    orderData: [1, 0]
                }, {
                    targets: [3],
                    orderData: [2, 0]
                }]
            });
        });
    </script>
@endsection