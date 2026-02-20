@extends('layout.master')

@section('content')
    <div class="bg-white dark:bg-gray-900">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div aria-hidden="true"
                class="cover absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                    class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative hidden rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20 dark:text-gray-400 dark:ring-white/10 dark:hover:ring-white/20">
                        Announcing our next round of funding. <a href="#"
                            class="font-semibold text-primary-600 dark:text-primary-400"><span aria-hidden="true"
                                class="absolute inset-0"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>

                <div class="text-center">
                    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-balance text-gray-900 dark:text-white">
                        پیوند، سرویس کوتاه‌کننده آدرس‌های اینترنتی</h1>
                    <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8 dark:text-gray-400"> این سرویس
                        رایگان است و می‌توانید به صورت نامحدود از آن استفاده کنید.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <form method="POST" action="{{ route('shorten') }}" class="flex flex-col w-full">
                            @csrf
                            <div class="flex w-full">
                                <input type="text" dir="ltr" type="text" name="link"
                                    placeholder="https://example.com/a-very-long-and-scary-link"
                                    value="{{ old('link', $link ?? '') }}"
                                    class="px-4 py-2 flex-1 rounded-r-xl border border-l-0 border-primary-200 dark:border-primary-800 placeholder-slate-400 focus:ring-0 focus:outline-none text-slate-500 bg-primary-50 dark:bg-primary-950"
                                    required>
                                <button type="submit"
                                    class="px-6 py-2 text-sm border border-primary-200 dark:border-primary-800 border-r-0 hover:cursor-pointer rounded-l-xl bg-primary-500 text-white active:bg-primary-800">
                                    کوتاه کن!
                                </button>
                            </div>
                            @error('link')
                                <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
            <div aria-hidden="true"
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                    class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75">
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
            <div class="text-center">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $stats['links_count'] }}</h6>
                <p class="text-sm font-medium text-gray-800 lg:text-base">
                    پیوند‌های ساخته شده
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $stats['profiles_count'] }}</h6>
                <p class="text-sm font-medium text-gray-800 lg:text-base">
                    یک‌وند‌های ساخته شده
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $stats['users_count'] }}</h6>
                <p class="text-sm font-medium text-gray-800 lg:text-base">
                    تعداد کاربر
                </p>
            </div>
        </div>
    </div>
    </section>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <p class="mt-2 text-3xl sm:text-4xl font-semibold tracking-tight text-pretty text-gray-900 lg:text-balance">
                    برخی از ویژگی‌های پیوند</p>
                <p class="mt-6 text-lg/8 text-gray-700">
                    ثبت نام رایگان است و همیشه رایگان باقی می ماند، هدف آن است که یک سیستم یکپارچه و حرفه ای برای کوتاه کردن
                    لینک به صورت ساماندهی شده برای تمامی کاربران ایرانی فراهم کنیم.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pr-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute top-0 right-0 flex size-10 items-center justify-center rounded-lg bg-primary-500">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                    <path
                                        d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            همیشه رایگان
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </dd>
                    </div>
                    <div class="relative pr-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute top-0 right-0 flex size-10 items-center justify-center rounded-lg bg-primary-500">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                    <path
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            امنیت بالا
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </dd>
                    </div>
                    <div class="relative pr-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute top-0 right-0 flex size-10 items-center justify-center rounded-lg bg-primary-500">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                    <path
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            کاملا اختصاصی
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </dd>
                    </div>
                    <div class="relative pr-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute top-0 right-0 flex size-10 items-center justify-center rounded-lg bg-primary-500">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                    <path
                                        d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            برای توسعه سریع
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <div class="bg-base-200 py-8 sm:py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-base-100 shadow-base-300/20 rounded-3xl p-8 shadow-lg sm:p-16 lg:p-24 bg-primary-50">
                <div
                    class="flex justify-between gap-8 max-md:flex-col max-sm:items-center max-sm:text-center md:items-center">
                    <div class="max-w-xs lg:max-w-lg">
                        <h2 class="text-base-content mb-4 text-3xl font-bold">یِک‌وَند اختصاصی می‌خوای؟‌</h2>
                        <p class="text-base-content/80">
                            یک‌وند یک آدرس اینترنتی کوتاه و اختصاصی است که به شما امکان ساختن یک هویت دیجیتال
                            برای
                            شروع کسب و کار دلخواه‌تان می‌دهد.
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-6 max-md:w-full max-md:flex-col md:justify-end">
                        <a href="{{ route('yekvand') }}"
                            class="bg-base-content text-base-100 flex w-fit items-center gap-4 rounded-xl px-6 py-3 bg-primary-500 text-white">
                            <div class="flex flex-col">
                                <p class="font-medium">جزییات بیشتر</p>
                            </div>
                        </a>
                    </div>
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
                <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
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
                <script>
                    // JavaScript to toggle the answers and rotate the arrows
                    document.querySelectorAll('[id^="question"]').forEach(function(button, index) {
                        button.addEventListener('click', function() {
                            var answer = document.getElementById('answer' + (index + 1));
                            var arrow = document.getElementById('arrow' + (index + 1));

                            if (answer.style.display === 'none' || answer.style.display === '') {
                                answer.style.display = 'block';
                                arrow.style.transform = 'rotate(0deg)';
                            } else {
                                answer.style.display = 'none';
                                arrow.style.transform = 'rotate(-180deg)';
                            }
                        });
                    });
                </script>
    @endif
@endsection
