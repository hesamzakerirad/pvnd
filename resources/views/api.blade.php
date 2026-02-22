@extends('layout.master')

@section('content')
    <div class="isolate bg-gray-50 pt-18 sm:pt-24">
        <div class="py-36">
            <div class="mx-auto max-w-5xl">
                <div class="flex gap-3 justify-center align-middle">
                    <div class="flex flex-col justify-center items-start">
                        <h1 class="text-3xl sm:text-3xl font-bold tracking-tight text-balance text-gray-900 mb-6">
                            چگونه از وب‌سرویس پیوند استفاده کنیم؟
                        </h1>
                        <div class="mb-6">
                            <p class="font-normal">پیوند یک وب‌سرویس رایگان برای توسعه‌دهنده‌های عزیز ایرانی آماده کرده که به
                                صورت نامحدود
                                می‌تونند در توسعه
                                محصول نرم‌افزاری خود از آن استفاده کنند؛ در پایین چگونگی استفاده از این وب‌سرویس توضیح داده
                                شده است.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-5xl py-12">
                <div>
                    <p>برای استفاده از وب‌سرویس پیوند کافی‌ست با استفاده از نوع <span
                            class="text-xs bg-primary-50 text-primary-500 border rounded px-1">POST</span> در پروتکل HTTP به
                        آدرس زیر درخواست دهید.
                        (آدرسی که می‌خواهید کوتاه کنید را با کلید <span
                            class="text-xs bg-primary-50 text-primary-500 border rounded px-1">link</span> در بدنه درخواست
                        ارسال
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
                            "link": "{{ config('app.url') }}/gg", // [tl! **]
                        },
                        "errors": []
                    }
                </x-torchlight-code>

                <div class="my-3">
                    <p>از اینکه از پیوند برای توسعه محصول خود استفاده کردید از شما سپاسگزاریم.</p>
                </div>
            </div>
        </div>
    </div>

    @if ($faq->isNotEmpty())
        <section class="py-10 sm:py-16 lg:py-24">
            <section class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
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
                                <i id="arrow{{ $key }}" class="fa-solid fa-angle-up"></i>
                            </button>
                            <div id="answer{{ $key }}" style="display:none"
                                class="px-4 pb-5 sm:px-6 sm:pb-6 text-gray-500">
                                @markdown($item->answer)
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </section>
    @endif
@endsection
