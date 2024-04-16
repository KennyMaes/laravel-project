@extends('layouts.guest')

@section('header')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News articles') }}
        </h2>

@endSection

@section('content')
                
                @auth
                    @if (auth()->user()->isAdmin())
                    <div class="flex justify-end">
                        <a class="btn btn-primary" href="{{ route('news-article.new') }}">Add new article</a>
                    </div>
                    @endif
                @endauth


                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($articles as $article)
                            <li class="flex justify-between items-center gap-x-6 py-4">
                                <div class="flex gap-4">
                                    <img class="w-20" src="{{ asset('newsArticleCovers/' . ($article->cover_image != null ? $article->cover_image : 'placeholder.jpg')) }}" alt="Avatar">
                                    <div class="flex flex-column min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <a class="text-sm font-semibold leading-6 text-gray-900" href="{{ route('news-article.get', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                        </div>
                                        <div class="devider-y">
                                            <div class="line-clamp-2">
                                                {{ $article->content }}
                                            </div>
                                            <div class="font-bold text-indigo-400">
                                                {{ $article->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden flex shrink-0 sm:flex sm:items-end">
                                    @auth
                                    @if (auth()->user()->isAdmin())
                                        <div class="pr-1">
                                            <form action="{{ route('news-article.edit', [ 'id' => $article->id]) }}" method="GET">
                                                @csrf
                                                @method('get')
                                                <button class="btn bg-indigo-500">
                                                    <i class="fas fa-pen text-white"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('news-article.delete', [ 'id' => $article->id]) }}" method="POST" id="deleteForm{{ $article->id }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick=" return confirmAction('Are you sure you want to delete this article?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    
                                    @endif
                                    @endauth
                                </div>
                            </li>
                        @endforeach
                    </ul>


@endSection 