@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $user['name'] }}
    </h2>
@endSection

@section('content')
<div class=" px-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

    <form method="post" action="{{ route('profile.update', ['user' => $user] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        @if($currentUser['id'] != $user['id'])
        <div>{{ $user->name }}</div>
        <div>{{ $user->email }}</div>
        @else
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" disabled="{{ $currentUser['id'] !== $user['id']}}" name="name" type="text" class="mt-1 block w-lg" :value="$user->name" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" disabled="{{ $currentUser['id'] !== $user['id']}}" name="email" type="email" class="mt-1 block w-full" :value="$user->email" autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        @endif
    </form>
</div>

@endSection
