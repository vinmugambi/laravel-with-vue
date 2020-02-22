@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        {{-- <div class="col-md-6">
            <create-post />
        </div>
        <div class="col-md-6 posts-container bg-gray-600" style="height: 35rem; overflow-y: scroll;">
            <all-posts />
        </div> --}}
        <h1 class="text-4xl">{{$post->title}}</h1>
        <div class="markdown">
            {!! (new Parsedown)->text($post->body) !!}
        </div>
        @if (count($post->post_images) > 0)
        <img src="{{$post->post_images[0]->post_image_path}}" alt="{{$post->post_images[0]->post_image_caption}}">
        @endif
    </div>
</div>
@endsection