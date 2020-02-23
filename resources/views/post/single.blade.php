@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($post->post_images) > 0)
        <img src="{{$post->post_images[0]->post_image_path}}" alt="{{$post->post_images[0]->post_image_caption}}">
        @endif
        <h1 class="text-4xl">{{$post->title}}</h1>
        <div class="markdown">
            {!! (new Parsedown)->text($post->body) !!}
        </div>      
    </div>
</div>
@endsection