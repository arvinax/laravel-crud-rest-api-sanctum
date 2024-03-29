@extends('layouts.master')

@section('content')

    <h1>Create Post</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf   
    <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'content')}}
            {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
       
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection