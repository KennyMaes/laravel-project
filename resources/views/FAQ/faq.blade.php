@extends('layouts.guest')

@section('content')
    <div class="pb-16">
        @auth
            @if (auth()->user()->isAdmin())
                <div class="flex justify-end gap-2">
                    <form action="{{ route('faq-question.new') }}" method="GET">
                        @csrf
                        @method('get')

                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>


                    </form>
                </div>
            @endif
        @else
            {{-- No button is shown when not logged in --}}
            @endif

            @foreach ($categories as $category)
                <div class="text-base font-bold text-indigo-400">
                    <div class="flex">
                        {{ $category->name }}
                        @auth
                            @if (auth()->user()->isAdmin())
                                <div class="dropdown">
                                    <button class="btn" type="button" id="optionsMenu" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="optionsMenu">
                                        <!-- Dropdown menu links -->
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('faq-category.delete', ['id' => $category->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" href="#"
                                                onclick="return confirmAction('Are you sure you want to delete this category with all related questions?')">
                                                <i class="fas fa-trash text-red-400"></i> Delete
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>



                    @foreach ($category->questions as $question)
                        <div class="flex align-items-center">
                            <div class="grow">
                                <div class="accordion-header flex justify-between align-items-center">
                                    <h2 class="mb-0 grow" id="headingOne">
                                        <div class="flex justify-between">
                                            <button
                                                class="grouprelative flex w-full items-center rounded-t-lg border-0 bg-white py-1 text-left text-sm text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
                                                type="button" aria-expanded="true">
                                                {{ $question->question }}

                                            </button>
                                            <span
                                                class="-me-1 ms-auto h-5 w-5 transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </span>
                                        </div>

                                    </h2>
                                </div>
                                <div id="collapseOne" class="!visible hidden" data-twe-collapse-item data-twe-collapse-show
                                    aria-labelledby="headingOne" data-twe-parent="#accordionExample">
                                    <div class="pl-2 text-xs font-regular text-gray-600 pb-4 pr-12">
                                        {{ $question->answer }}
                                    </div>
                                </div>
                            </div>
                            @auth
                                @if (auth()->user()->isAdmin())
                                    <div class="dropdown pl-2" style="outline: none">
                                        <button class="btn" type="button" id="optionsMenu" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="optionsMenu">
                                            <!-- Dropdown menu links -->
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('faq.delete', ['id' => $question->id]) }}" method="post">
                                              @csrf
                                              @method('delete')
                                              <button class="dropdown-item" href="#"
                                                  onclick="return confirmAction('Are you sure you want to delete this questions?')">
                                                  <i class="fas fa-trash text-red-400"></i> Delete
                                              </button>
                                          </form>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                    <div class="border-b border-gray-200 my-2"></div>

                </div>
            @endforeach
        </div>
    @endSection
