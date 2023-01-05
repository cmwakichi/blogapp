@extends('layouts.app')

@section('content')
    <div class="m-auto text-center w-4/5">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">Blog Posts</h1>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="m-auto mt-10 w-4/5 pl-2" x-data="{show : true}" x-init="setTimeout(() => show = false, 4000)"
            x-show="show">
            <p class="mb-4 w-1/6 text-gray-50 bg-green-500 rounded-2xl py-4">{{ session()->get('message') }}</p>
        </div>
    @endif
    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create"
                class="bg-blue-500 uppercase background-transparent text-gray-100 text-extrasmall font-extrabold py-3 rounded-3xl px-5">Create
                post</a>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="flex w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="https://cdn.pixabay.com/photo/2014/09/24/14/29/macbook-459196_960_720.jpg" alt="laptop-image"
                    width="200px" height="200px">
            </div>
            <div class="ml-10">
                <h2 class="text-gray-700 font-bold text-5xl pb-4">{{ $post->title }}</h2>
                <span class="text-gray-500">
                    By <span class="font-bold italic text-gray-800">Code with
                        {{ $post->user->name }},</span>Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->description }}
                </p>
                <a href="/blog/{{ $post->id }}"
                    class="uppercase bg-blue-500 text-gray-100 text-l font-extrabold py-4 px-8 rounded-3xl">Keep
                    Reading
                </a>
                @if (isset(Auth::user()->id) && Auth::id() == $post->user_id)
                    <span class="float-right">
                        <a href="/blog/{{ $post->slug }}/edit"
                            class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">Edit <span>&rarr;</span>
                        </a>
                    </span>
                    <span class="float-right mr-3">
                        <form action="/blog/{{ $post->slug }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-pr3">
                                Delete
                            </button>
                        </form>
                    </span>
                @endif
            </div>
        </div>
    @endforeach
@endsection
