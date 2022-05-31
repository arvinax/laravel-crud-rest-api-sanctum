@extends('layouts.master')

@section('content')
    
@if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well" >
                <div class="row" style="background-color: rgb(155, 178, 194); margin:0.5rem; padding: 1rem; border-radius:0.1%; font-family: sans-serif">
                    {{-- <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div> --}}
                    <div class="col-md-8 col-sm-8" style="background-color: rgb(174, 210, 217); border-radius: 3% ">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <p>{{$post->content}}</p>
                        <small>{{$post->created_at}} </small>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{$posts->links()}} --}}
    @else
        <p>No posts found</p>
    @endif
            



@endsection


