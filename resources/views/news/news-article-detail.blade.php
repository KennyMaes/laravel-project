@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="btn btn-warning mr-3 mb-2 font-bold" href="/news">Back</a>
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex align-items-center jusify-between pb-4">
                    <div class="text-lg grow text-indigo-800 font-bold">{{ $article['title'] }}</div>
                    <div>
                        <div class="text-indigo-400">{{ 'Created at: ' . $article->created_at }}</div>
                        <div class="text-indigo-400">
                            Authors:
                            @foreach ($article->users as $user)
                            {{ $user->username }}
                            @if (!$loop->last), @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <img class="w-80" src="{{ asset('newsArticleCovers/' . ($article->cover_image != null ? $article->cover_image : 'placeholder.jpg')) }}" alt="Avatar">
                </div>
                <div class="text-gray-800 text-center pt-4">
                    {{ $article->content }}
                </div>
                <div class="divide-y divide-gray-900"></div>
                <div class="mt-12 p-6 bg-indigo-200 rounded-xl">
                    @if (Auth::check())
                        <div class="font-semibold text-lg text-indigo-600 leading-tight">{{ __('Reactions') }}</div>
                        <div>
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
                            @foreach ($article->reactions as $reaction)
                                <div>
                                    <p class="pt-2 text-gray-600">{{ $reaction->content }}</p>
                                    <p>{{ $reaction->created_at }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center"><a href="/login" class="text-indigo-600 font-bold">Login</a> to add comments to this article</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endSection
