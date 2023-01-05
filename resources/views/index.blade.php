@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">

        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 text-center block">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">Do you want to become a
                    developer?</h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">Read
                    more</a>
            </div>
        </div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="https://cdn.pixabay.com/photo/2014/09/24/14/29/macbook-459196_960_720.jpg" alt="laptop-image">
            </div>
            <div class="m-auto sm:m-auto text-left w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Struggling to be a better web developer
                </h2>
                <p class="py-5 text-gray-500 test-xl">Lorem ipsum dolor, rptatem dicta rerum exercitationem explicabo amet.
                </p>
                <p class="font-extrabold text-gray-600 pb-8 text-xl">Lorem ipsum, dolor sit amet consectetur adipisicin
                    g elit. Nam id magni maxime exercitationem t excepturi asperiores temporibus nesciunt ea ut, repellat
                    corporis.
                </p>
                <a href="/blog"
                    class="uppercase bg-blue-500 text-gray-500 text-s font-extrabold py-3 px-8 rounded-3xl">Find
                    out more.</a>
            </div>

        </div>
    </div>
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">I am an expert in...</h2>
        <span class="font-extrabold block text-4xl py-1">UX Design</span>
        <span class="font-extrabold block text-4xl py-1">Fronend Development</span>
        <span class="font-extrabold block text-4xl py-1">Project management</span>
        <span class="font-extrabold block text-4xl py-1">Backend development</span>
    </div>
    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400 ">Blog</span>
        <h2 class="font-4xl font-bold py-10">Recent Posts</h2>
        <p class="m-auto w-4/5 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, laudantium
            fugi
            at expedita reiciendis placs quisquam illum ducimus ea ad, harum cumque officiis repudiandae.
        </p>
    </div>
    <div class="sm:grid grid-cols-2 w-4/5 m-auto ">
        <div class="bg-yellow-700 flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="text-xs uppercase">PHP</span>
                <h3 class="text-xl font-bold py-10">Lorem ipsum dolor sit amet consectetm modi ab enim. Voluptatibus, harum
                    officia.</h3>
                <a href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find out more
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/09/24/14/29/macbook-459196_960_720.jpg" alt="laptop-image">
        </div>
    </div>
@endsection
