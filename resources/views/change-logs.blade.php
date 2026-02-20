@extends('layout.master')

@section('content')
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75">
            </div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">مسیر رشد</h2>
            <p class="mt-2 text-lg/8 text-gray-600">در این برگه می‌توانید مسیر رشد پیوند را از ابتدای ساخت تا این لحظه مشاهده کنید.</p>
        </div>
        <div>
            <ul class="list-inside list-disc marker:text-blue-600">
                @foreach ($changeLogs as $log)
                    <li class="mb-2 flex">
                        <span class="font-semibold">{{ $log->created_at->format('Y/m/d') }}</span>
                        <span class="mx-3"> - </span>
                        <span>@markdown($log->content)</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
