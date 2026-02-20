@extends('layout.master')

@section('content')
    <div class="isolate bg-white py-18 sm:py-24">
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75">
            </div>
        </div>
        <div class="mb-6 bg-gray-100 py-32 border-t border-b border-gray-300">
            <div class="mx-auto max-w-3xl">
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-balance text-gray-900 mb-3">یک‌وند چیست؟</h2>
                <p class="mt-5">پیوند راه‌حلی برای حل مشکل شلوغی و یک‌پارچه‌سازی هویت اینترنتی شما معرفی کرده است و آن
                    یک‌وند است.</p>
                @if (auth()->check())
                    <a class="inline-block border rounded-xl bg-primary-500 text-white py-2 px-4 mt-3"
                        href="{{ route('filament.user.resources.profiles.create') }}">ساخت یک‌وند رایگان</a>
                @else
                    <a class="inline-block border rounded-xl bg-primary-500 text-white py-2 px-4 mt-3"
                        href="{{ route('filament.user.auth.register') }}">ثبت نام رایگان</a>
                @endif
            </div>
        </div>
        <div class="mx-auto max-w-3xl">
            <div class="mt-12 mb-3">
                <p>برای استفاده از وب‌سرویس پیوند کافی‌ست با استفاده از نوع POST در پروتکل HTTP به آدرس زیر درخواست دهید.
                    (آدرسی که می‌خواهید کوتاه کنید را با کلید <span
                        class="text-xs bg-primary-50 text-primary-500 border rounded px-1">link</span> در بدنه درخواست ارسال
                    کنید.)</p>
            </div>

            <x-torchlight-code language='text' class="whitespace-pre border border-gray-300 rounded-xl p-5 pt-0 my-6">
                {{ route('v1.shorten') }}
            </x-torchlight-code>

            <div class="my-3">
                <p>یا اگر احتیاج به cURL دارید، مقدار زیر را کپی کرده و در ترمنیال وارد کنید.</p>
            </div>

            <x-torchlight-code language='curl' class="whitespace-pre border border-gray-300 rounded-xl p-5 pt-0 my-6">
                curl --location '{{ route('v1.shorten') }}' \
                --header 'Accept: application/json' \
                --form 'link="https://google.com"'
            </x-torchlight-code>

            <div class="my-3">
                <p>در پایان سرور پیوند کوتاه شما را با کد 201 در قالب زیر به شما برمی‌گرداند.</p>
            </div>

            <x-torchlight-code language='json' class="whitespace-pre border border-gray-300 rounded-xl p-5 pt-0 my-6">
                {
                "status": "success",
                "message": "پیوند کوتاه شما با موفقیت ساخته شد.",
                "data": {
                "link": "{{ config('app.url') }}/gg", // <--- ✅ }, "errors" : [] } </x-torchlight-code>

                    <div class="my-3">
                        <p>از اینکه از پیوند برای توسعه محصول خود استفاده کردید از شما سپاسگزاریم.</p>
                    </div>
        </div>
    </div>

    </div>
@endsection
