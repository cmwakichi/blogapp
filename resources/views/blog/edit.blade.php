@extends('layouts.app')

@section('content')
    <div class="m-auto text-left w-4/5">
        <div class="py-15">
            <h1 class="text-6xl">Edit Post</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="m-auto pt-20 w-4/5">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Title..." value="{{ $post->title }}"
                class="bg-transparent block border-b-2 w-4/5 h-20 text-6xl outline-nooe">
            <textarea name="description" placeholder="Description..."
                class="py-20 bg-transparent block border-b-2 w-4/5 h-60 text-xl outline-none">
                {{ $post->description }}
            </textarea>

            <button type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Submit
                Post</button>
        </form>
    </div>
@endsection
