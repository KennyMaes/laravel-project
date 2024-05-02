@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $user['name'] }}
    </h2>
@endSection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex align-items-center gap-5">
                        <img class="h-20 w-20 flex-none rounded-full bg-gray-50"
                            src="{{ asset('avatars/' . ($user->image != null ? $user->image : 'avatar.png')) }}"
                            alt="Avatar">
                        <div>
                            <div class="flex align-items-center gap-2">
                                <div class="text-lg font-semibold">{{ $user->name }}</div>
                                <div class="text-sm">({{ $user->username }})</div>
                            </div>
                            <div>{{ $user->email }}</div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="text-lg font-semibold">Birthdate</div>
                        @if (isset($user->birthdate) && !empty($user->birthdate))
                        <div class="text-sm">{{ $user->birthdate }}</div>
                        @else
                            <p>The user has not set a birthdate</p>
                        @endif
                        

                    </div>

                    <div class="pt-5">
                        <div class="text-lg font-semibold">Biography</div>
                        @if (isset($user->biografie) && !empty($user->biografie))
                        <div class="text-sm">{{ $user->biografie }}</div>
                        @else
                            <p>The user has not set a biography</p>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endSection
