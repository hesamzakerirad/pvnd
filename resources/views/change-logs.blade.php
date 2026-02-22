@extends('layout.master')

@section('content')
    <div class="isolate bg-gray-50 pt-18 sm:pt-24">
        <div class="py-36">
            <div class="mx-auto max-w-5xl">
                <div class="flex gap-3 justify-start align-middle">
                    <div class="flex flex-col justify-center items-start">
                        <h1 class="text-3xl sm:text-3xl font-bold tracking-tight text-balance text-gray-900 mb-6">
                            مسیر رشد پیوند
                        </h1>
                        <div class="mb-6">
                            <p class="font-normal">در این برگه روند رشد پیوند به عنوان یک محصول رو از ابتدای تولد تا امروز
                                مشاهده می‌کنید.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-5xl py-12">
                <div>
                    <ul class="list-inside list-disc marker:text-blue-600">
                        @forelse ($changeLogs as $log)
                            <li class="mb-2 flex">
                                <span class="font-semibold">{{ $log->created_at->format('Y/m/d') }}</span>
                                <span class="mx-3"> - </span>
                                <span>@markdown($log->content)</span>
                            </li>
                        @empty
                            پیوند هنوز هیچ رشدی نکرده... باید کمی صبر کنید!
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($faq))
        <section class="py-10 sm:py-16 lg:py-24">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold leading-tight text-black">
                        پرسش‌های پرتکرار
                    </h2>
                </div>
                <div class="max-w-7xl mx-auto mt-8 space-y-4 md:mt-16">
                    @foreach ($faq as $key => $item)
                        @php
                            $key++;
                        @endphp
                        <div
                            class="transition-all duration-200 bg-white border border-gray-50 rounded-xl shadow-lg cursor-pointer hover:bg-gray-50">
                            <button type="button" id="question{{ $key }}" data-state="closed"
                                class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                <span class="flex text-lg font-semibold text-black">
                                    @markdown($item->question)
                                </span>
                                <svg id="arrow{{ $key }}" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div id="answer{{ $key }}" style="display:none"
                                class="px-4 pb-5 sm:px-6 sm:pb-6 text-gray-500">
                                @markdown($item->answer)
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>
    @endif
@endsection
