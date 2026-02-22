@extends('layout.master')

@section('content')
    <div class="isolate bg-gray-50 py-36 sm:pt-24">
        <div class="py-36">
            <div class="mx-auto max-w-5xl">
                <div class="flex gap-3 justify-start align-middle">
                    <div class="flex flex-col justify-center items-start">
                        <h1 class="text-3xl sm:text-3xl font-bold tracking-tight text-balance text-gray-900 mb-6">یک‌وند
                            چیست؟
                        </h1>
                        <div class="mb-6">
                            <p class="font-semibold">یک‌وند یک آدرس اختصاصی برای شماست تا هویت دیجیتال خود را سادگی در
                                اینترنت
                                ثبت
                                کنید.
                            </p>
                            <p class="font-normal">پیوند راه‌حلی برای حل مشکل شلوغی و یک‌پارچه‌سازی هویت اینترنتی شما معرفی
                                کرده
                                است
                                و آن
                                یک‌وند است.
                            </p>
                        </div>
                        <div>
                            @if (auth()->check())
                                <a href="{{ route('filament.user.resources.profiles.create') }}"
                                    class="bg-primary-500 text-white py-3 px-6 rounded-xl inline-block">
                                    <span>ساخت یک‌وند رایگان</span>
                                    <i class="fas fa-arrow-left mr-3"></i>
                                </a>
                            @else
                                <a href="{{ route('filament.user.auth.register') }}"
                                    class="bg-primary-500 text-white py-3 px-6 rounded-xl inline-block">
                                    <span>ثبت‌نام رایگان</span>
                                    <i class="fas fa-arrow-left mr-3"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="mx-auto max-w-5xl">
                <div class="py-36">
                    <p>یک ماژول جاواسکریپت برای تولید متن لورم ایپسوم به زبان فارسی است لورم ایپسوم متنی آزمایشی و بی معنی
                        در
                        طراحی می باشد که طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه
                        شکل
                        ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید </p>
                </div>
            </div>
        </div>

        <div class="bg-base-200 py-8 sm:py-16 lg:py-24">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="bg-base-100 shadow-base-300/20 rounded-3xl p-8 shadow-lg sm:p-16 lg:p-24 bg-primary-50">
                        <div
                            class="flex justify-between gap-8 max-md:flex-col max-sm:items-center max-sm:text-center md:items-center">
                            <div class="max-w-xs lg:max-w-lg">
                                <h2 class="text-base-content mb-4 text-3xl font-bold">نیاز به کارت فیزیکی داری؟</h2>
                                <p class="text-base-content/80">
                                    در صورت نیاز می‌تونی درخواست چاپ یک‌وند رو به صورت کارت فیزیکی برای ما ارسال کنی و مثل
                                    یک کارت ویزیت حرفه‌ای تحویلش بگیری!
                                </p>
                            </div>
                            <div class="flex flex-wrap items-center gap-6 max-md:w-full max-md:flex-col md:justify-end">
                                <a href="{{ route('filament.user.resources.profiles.create') }}"
                                    class="bg-base-content text-base-100 flex w-fit items-center gap-4 rounded-xl px-6 py-3 bg-primary-500 text-white">
                                    <span class="font-medium">ساخت یک‌وند</span>
                                    <i class="fas fa-arrow-left mr-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (!empty($faq))
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
    </div>
@endsection
