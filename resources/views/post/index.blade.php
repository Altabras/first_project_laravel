@extends('layouts.main')
@section('content')
    <div>
        <a href="{{route('post.create')}}" class="btn btn-dark mb-3 mt-3">Create</a>
    </div>

    <div>
        @foreach($posts as $post)
           <div><a href="{{route('post.show', $post->id)}}"> {{$post->id}}. {{$post->title}}</a></div>
        @endforeach
    </div>
@endsection
