@extends('layouts.guest')

@section('content')
    <div class="lg:mx-auto">
        <p class="mt-8 text-base font-bold tracking-tight text-gray-700 sm:text-4xl">
            Resources that were used for this
        </p>
        <ul>
            <li>ChatGPT:
                <a target="_blank" href="//www.chatgpt.com/">www.chatgpt.com</a>
            </li>
            <li>Laravel documentation:
                <a target="_blank" href="//www.laravel.com/docs/11.x">www.laravel.com</a>
            </li>
        </ul>
        <div class="pt-6"></div>
        <hr>
        <p class="text-base font-bold tracking-tight text-gray-700 sm:text-4xl">
            Some information about this
            project
        </p>
        <p class="text-xs">The project is about news articles and as a user or admin you could do following things</p>
        <p class="text-sm mt-2">As an admin</p>
        <ul class="list-disc ml-8">
            <li>
                Remove users
            </li>
            <li>
                Make a normal user an admin and vice versa
            </li>
            <li>
                Create Articles
            </li>
            <li>
                Add and remove users
            </li>
            <li>
                See and create/update FAQ
            </li>
            <li>
                Update profile
            </li>
            <li>
                See your articles, and you will become an author if you contribute to an article
            </li>
            <li>
                See other profiles
            </li>
            <li>
                See Requests from other users
            </li>
        </ul>
        <p class="text-sm mt-2">As a normal user</p>
        <ul class="list-disc ml-8">
            <li>
                See news articles
            </li>
            <li>
                Add reaction to news article
            </li>
            <li>
                See FAQ
            </li>
            <li>
                Update profile
            </li>
            <li>
                See other profiles
            </li>
        </ul>
        <div class="pt-6"></div>
        <hr>
        <p class="text-sm mt-2">For the many-to-many relation I have a user that could have multiple articles and an article could have multiple authors(users)</p>
    </div>
@endSection
