@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-9x    l mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                </div>
            </div>
        </div>
    </div>
@endSection
