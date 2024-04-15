@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-9x    l mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contact-form.post') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group max-w-xl">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" value="" name="email" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                        <div class="form-group max-w-xl">
                            <x-input-label for="question" :value="__('Question')" />
                            <x-textfield-input id="question" class="block mt-1 w-full" name="question" required autofocus></x-textfield-input>
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <button class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endSection
