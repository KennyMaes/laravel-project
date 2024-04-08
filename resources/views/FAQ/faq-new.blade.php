@extends('layouts.app')

@section('header')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Question') }}
        </h2>

@endSection

@section('content')
    
    <div class="py-12">
        <div class="max-w-9x    l mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <form action="{{ route('faq-question.create') }}" method="POST">
                @csrf
                @method('post')
                <div class="form-group max-w-xl">
                    <div class="flex justify-between items-end gap-4">
                        <div class="grow">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category:</label>
                        <select name="faq_category_id" id="category_id" class="mt-1 block w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('faq-category.new') }}" class="btn btn-primary">New Category</a>

                    </div>
                </div>
                <div class="form-group max-w-xl">
                    <x-input-label for="question" :value="__('Question')" />
                    <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" required autofocus />
                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div>
                    <div class="form-group max-w-xl">
                        <x-input-label for="answer" :value="__('Answer')" />
                        <x-text-input id="answer" class="block mt-1 w-full" type="text" name="answer" required autofocus />
                        <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                    </div>

                        <button class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endSection