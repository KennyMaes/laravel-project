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
                    <form action="{{ isset($category) ? route('faq-category.update', ['id' => $category->id]) : route('faq-category.create') }}" method="POST">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif
                        <div class="form-group max-w-xl">
                            <x-input-label for="category" :value="__('Category name')" />
                            <x-text-input id="category" class="block mt-1 w-full" type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" required
                                autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <button class="btn btn-primary">{{ isset($category) ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endSection
