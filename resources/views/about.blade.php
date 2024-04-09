@extends('layouts.guest')

@section('content')
    <div class="lg:mx-auto">
        <p class="mt-8 text-base font-bold tracking-tight text-gray-700 sm:text-4xl">This project is working
            with Vite</p>
        <p class="text-xs">To run this application locally you need to run the following command '<b>npm run start</b>'</p>
        <p class="text-xs">This will run Vite and start the PHP server</p>

        <p class="mt-8 text-base font-bold tracking-tight text-gray-700 sm:text-4xl">Something about this
            project</p>
        <p class="text-xs">The project that i created could be used to keep track of projects inside an organisation</p>
        <p class="text-sm mt-2">As an admin</p>
        <ul class="list-disc ml-8">
            <li>
              Add and remove users
            </li>
            <li>
              Create Projects
            </li>
        </ul>
        <p class="text-sm mt-2">As a normal user</p>
        <ul class="list-disc ml-8">
            <li>
                See Projects
            </li>
        </ul>
    </div>
@endSection
