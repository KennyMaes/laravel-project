@extends('layouts.app')

@section('header')
{{ __('Requests') }}
@endSection

@section('content')

@if(count($contactRequests) > 0)
<ul role="list" class="divide-y divide-gray-100">
    @foreach ($contactRequests as $request)
    <li class="flex justify-between items-center gap-x-6 py-4">
        <div class="flex flex-column min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
                <a class="text-sm font-semibold leading-6 text-gray-900">{{ $request->email}}</a>
            </div>
            <div class="devider-y">
                <div class="line-clamp-2">
                    {{ $request->question }}
                </div>
                <div class="font-bold text-indigo-400">
                    {{ $request->created_at }}
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>
@else
    There are no requests at the moment
@endIf
@endSection
