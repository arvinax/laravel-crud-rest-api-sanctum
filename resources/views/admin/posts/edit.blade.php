@extends('layouts.master')

@section('content')


    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf   
    <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'content')}}
            {{Form::textarea('content', $post->content, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
       {{ Form::hidden('_method', 'PUT') }}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection