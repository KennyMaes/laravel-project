@extends('layouts.app')

@section('header')
{{ __('About') }}
@endSection

@section('content')
<div class="lg:mx-auto">
    <p class="mt-8 text-base font-bold tracking-tight text-gray-700 sm:text-4xl">
        Resources that were used for this
    </p>
    <ul>
        <li class="font-bold">ChatGPT:
            <a class="font-medium text-blue-600" target="_blank" href="//www.chatgpt.com/">www.chatgpt.com</a>
        </li>
        <li class="font-bold">Laravel documentation:
            <a class="font-medium text-blue-600" target="_blank" href="//www.laravel.com/docs/11.x">www.laravel.com</a>
        </li>
        <li class="font-bold">Tailwind CSS:
            <a class="font-medium text-blue-600" target="_blank" href="//www.tailwindcss.com/">www.tailwindcss.com</a>
        </li>
        <li class="font-bold">Laravel Vite:
            <a class="font-medium text-blue-600" target="_blank" href="//www.medium.com/@mohasin-dev/using-laravel-vite-to-automatically-refresh-your-browser-when-changing-a-blade-file-afa9edeccf46">https://medium.com/</a>
        </li>
    </ul>
    <div class="pt-6"></div>
    <hr>
    <p class="text-base font-bold tracking-tight text-gray-700 sm:text-4xl">
        Some information about this
        project
    </p>
    <p class="text-xs">2 users are created when running `php artisan migrate:fresh --seed`</p>
    <ul class="list-disc ml-8">
        <li>Admin</li>
        <ul class="list-disc ml-8">
            <li>Username: Admin</li>
            <li>Password: Password!321</li>
            <li>Email: admin@ehb.be</li>

        </ul>
        <li>User</li>
        <ul class="list-disc ml-8">
            <li>Username: User</li>
            <li>Password: User!321</li>
            <li>Email: user@ehb.be</li>
        </ul>
    </ul>
    <p class="text-xs mt-4">The project is about news articles and as a user or admin you could do following things</p>
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
    <p class="text-sm mt-2">For the many-to-many relation (Articles and authors)</p>
    <ul class="list-disc ml-8">
        <li>The articles are shown in the user dashboard</li>
        <li>The authors(users) are shown in the detail view of an article(Top right)</li>
        <li>Author is added at creating of an article or when contributing to an article</li>
    </ul>

</div>
@endSection
