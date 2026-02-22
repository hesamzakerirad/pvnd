@extends('layout.master')

@section('content')
    <div class="isolate bg-gray-50 pt-18 sm:pt-24">
        <div class="py-36">
            <div class="mx-auto max-w-5xl">
                <div class="flex gap-3 justify-start align-middle">
                    <div class="flex flex-col justify-center items-start">
                        <h1 class="text-3xl sm:text-3xl font-bold tracking-tight text-balance text-gray-900 mb-6">
                            نقشه سایت
                        </h1>
                        <div class="mb-6">
                            <p class="font-normal">در پایین تمام برگه‌های سایت رو مشاهده می‌کنید.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-5xl py-12">
                <div>
                    <ul class="max-w-md space-y-1 text-body list-disc list-inside">
                        @foreach ($pages as $page)
                            <li>
                                <a href="{{ $page['route'] }}" class="py-3 text-gray-700 font-medium">
                                    <span>{{ $page['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
