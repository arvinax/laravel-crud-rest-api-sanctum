@extends('layouts.master')

@section('content')
    <a href="/posts" class="btn btn-default" style="background-color: white; color: black; border: 2px solid #4CAF50;">Go Back</a>
        <h1>{{$post->title}}</h1>

    <br><br>
    <div>
        <p style="font-size: 200%; font-family:sans-serif">{!!$post->content!!}</p>
    </div>
    <hr>
        <small>Written on {{$post->created_at}}</small>
    <hr>
        <a href="/posts/{{$post->id}}/edit" class="btn btn-info" style="margin-bottom: 5%">Edit</a>
    {!!Form::open(['action' => ['App\Http\Controllers\PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}

    
@endsection

