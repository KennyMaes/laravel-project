@extends('layouts.app')

@section('header')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News articles') }}
        </h2>

@endSection

@section('content')
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (auth()->user()->is_admin == true)
                <div class="p-6">
                    <a class="btn btn-primary" href="{{ route('news-article.new') }}">Add new article</a>
                </div>
                @endif
                <div class="p-6">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($articles as $article)
                            <li class="flex justify-between items-center gap-x-6 py-4">
                                <div class="flex flex-column min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <a class="text-sm font-semibold leading-6 text-gray-900" href="{{ route('news-article.get', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                    </div>
                                    <div class="devider-y">
                                        <div class="line-clamp-2">
                                            {{ $article->content }}
                                        </div>
                                        <div class="font-bold text-orange-400">
                                            {{ $article->created_at }}
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden flex shrink-0 sm:flex sm:items-end">
                                    @if (auth()->user()->is_admin == true)
                                        <div class="pr-1">
                                            <form action="{{ route('news-article.edit', [ 'id' => $article->id]) }}" method="GET">
                                                @csrf
                                                @method('get')
                                                <button class="btn btn-secondary">Edit</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('news-article.delete', [ 'id' => $article->id]) }}" method="POST" id="deleteForm{{ $article->id }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirmDelete({{ $article->id }})">Delete</button>
                                            </form>
                                        </div>
                                    
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endSection 

<script>
    function confirmDelete(articleId) {
        if (confirm('Are you sure you want to delete this article?')) {
            document.getElementById('deleteForm' + articleId).submit();
            return true;
        } else {
            return false;
        }
    }
</script>