@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $article['title'] }}
    </h2>
@endSection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a class="btn btn-warning mr-3 mb-2 font-bold" href="/news">Back</a>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="pl-6 pt-6 text-orange-400">
                {{'Created at: ' .  $article->created_at }}
            </div>
            <div class="p-6 text-gray-900">
                {{ $article->content }}
            </div>
            <div class="ml-6 font-semibold text-lg text-gray-800 leading-tight">{{ __('Reactions') }}</div>
            <div class="m-6">
                <form action="{{ route('reaction.create', ['article_id' => $article->id]) }}" method="POST">
                    @csrf
                    @method('post')
                    <x-input-label for="content"></x-input-label>
                    <x-textfield-input id="content" name="content"></x-textfield-input>
                    @error('content')
                        <span class="error">{{ $message }}</span><br>
                    @enderror
                    <button class="btn btn-primary">Add reaction</button>
                </form>
            </div>
            <div class="m-6 divide-y divide-gray-100">
                @foreach($article->reactions as $reaction)
                    <div>
                        <p class="pt-2 text-gray-600">{{ $reaction->content }}</p>
                        <p>{{ $reaction->created_at }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endSection