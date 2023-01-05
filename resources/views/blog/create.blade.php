@extends('layouts.app')

@section('content')
    <div class="m-auto text-left w-4/5">
        <div class="py-15">
            <h1 class="text-6xl">Create Post</h1>
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
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" placeholder="Title..."
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none placeholder:italic placeholder:text-slate-400">
            <textarea name="description" placeholder="Description..."
                class="py-20 bg-transparent block border mt-3 w-full h-60 text-xl outline-none">
            </textarea>
            <div class="bg-grey-lighter pt-15">
                <label
                    class="w-44 flex flex-col items-center px-2 py-3 bg-white-100 rounded-lg
                    shadow-lg tracking-wide uppercase border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden ">
                </label>
            </div>
            <button type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Submit
                Post</button>
        </form>
    </div>
@endsection
