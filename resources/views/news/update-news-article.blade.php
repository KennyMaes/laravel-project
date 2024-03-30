@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update article') }}
    </h2>
@endSection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('news-article.update', ['id' => $article->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group max-w-xl">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" value="{{$article->title}}" name="title" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <x-input-label for="content" :value="__('Content')" />
                    <x-textfield-input id="content" name="content" class="form-group max-w-xl">{{ $article->content }}</x-textfield-input>
                    <button class="btn btn-primary">Update article</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection