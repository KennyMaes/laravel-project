@extends('layouts.guest')

@section('content')

@vite(['resources/js/faq.js'])
    
            @auth
            <form action="{{ route('faq-question.new') }}" method="GET">
                @csrf
                @method('get')
                <button class="btn btn-primary">Add Question</button>
            </form>
            @else
            {{-- No button is shown when not logged in --}}
            @endif

                @foreach ($categories as $category)
                <div class="text-base font-bold text-gray-400">
                    {{ $category->name }}

                    @foreach ($category->questions as $question)
                <div>
                  <h2 class="mb-0 accordion-header" id="headingOne">
                    <button
                      class="group relative flex w-full items-center rounded-t-lg border-0 bg-white px-2 py-1 text-left text-sm text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
                      type="button"
                      aria-expanded="true">
                      {{ $question->question }}
                      <span
                        class="-me-1 ms-auto h-5 w-5 transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                      </span>
                    </button>
                  </h2>
                  <div
                    id="collapseOne"
                    class="!visible hidden"
                    data-twe-collapse-item
                    data-twe-collapse-show
                    aria-labelledby="headingOne"
                    data-twe-parent="#accordionExample">
                    <div class="px-2 text-xs font-regular">
                        {{ $question->answer }}
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="border-b border-gray-200 my-2"></div>

                </div>
                @endforeach

@endSection