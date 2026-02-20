<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="description"
        content="Shorten long URLs, track clicks, analyze traffic, and manage branded links with YourBrand URL Shortener. Fast, secure, and SEO-friendly.">
    <meta name="keywords" content="url shortener, link shortener, shorten link, branded links, link tracking">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Canonical -->
    <link rel="canonical" href="{{ config('app.url') }}">

    <!-- Open Graph (Facebook, LinkedIn, etc.) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Shorten Links & Track Clicks | YourBrand">
    <meta property="og:description"
        content="Create short links, monitor clicks, and grow your business with YourBrand URL Shortener.">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="https://yourdomain.com/assets/og-image.png">
    <meta property="og:site_name" content="YourBrand">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Shorten Links & Track Clicks | YourBrand">
    <meta name="twitter:description" content="Short links, real-time analytics, and branded URLs with YourBrand.">
    <meta name="twitter:image" content="https://yourdomain.com/assets/og-image.png">

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Language -->
    <meta http-equiv="content-language" content="en">

    <!-- Theme (optional, UX) -->
    <meta name="theme-color" content="{{ config('variables.primary-color') }}">
</head>

<body>
    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="{{ config('app.url') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                        alt="" class="h-8 w-auto dark:hidden" />
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="" class="h-8 w-auto not-dark:hidden" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" command="show-modal" commandfor="mobile-menu"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 dark:text-gray-200">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-gray-900 dark:text-white">خانه</a>
                <a href="{{ route('api') }}" class="text-sm/6 font-semibold text-gray-900 dark:text-white">وب‌سرویس</a>
                <a href="{{ route('blog') }}" class="text-sm/6 font-semibold text-gray-900 dark:text-white">دانشنامه</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @if (auth()->check())
                    <form action="{{ route('filament.user.auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm/6 dark:text-primary-600 rounded-xl border border-primary-600 px-4 py-2 text-primary-600 hover:bg-primary-600 hover:text-white transition">
                            خروج از حساب کاربری</button>
                    </form>
                @else
                    <a href="{{ route('filament.user.auth.login') }}"
                        class="text-sm/6 dark:text-primary-600 rounded-xl border border-primary-600 px-4 py-2 text-primary-600 hover:bg-primary-600 hover:text-white transition">
                        ورود | ثبت نام</a>
                @endif
            </div>
        </nav>
        <el-dialog>
            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                <div tabindex="0" class="fixed inset-0 focus:outline-none">
                    <el-dialog-panel
                        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 dark:bg-gray-900 dark:sm:ring-gray-100/10">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>
                                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                                    alt="" class="h-8 w-auto dark:hidden" />
                                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="" class="h-8 w-auto not-dark:hidden" />
                            </a>
                            <button type="button" command="close" commandfor="mobile-menu"
                                class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-200">
                                <span class="sr-only">Close menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/10 dark:divide-white/10">
                                <div class="space-y-2 py-6">
                                    <a href="{{ route('contact') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">تماس
                                        با ما</a>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Features</a>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Marketplace</a>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Company</a>
                                </div>
                                <div class="py-6">
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Log
                                        in</a>
                                </div>
                            </div>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    </header>

    <section>
        <div>
            @yield('content')
        </div>
    </section>

    <footer class="bg-gray-100 py-10">
        <div class="container mx-auto text-xs">
            <div class="pb-10 mb-10 border-b border-gray-300">
                <nav class="flex justify-start gap-4">
                    <a class="text-primary-500 hover:underline" href="{{ route('api') }}">وب‌سرویس</a>
                    <a class="text-primary-500 hover:underline" href="{{ route('blog') }}">دانشنامه</a>
                    <a class="text-primary-500 hover:underline" href="{{ route('change-logs') }}">مسیر رشد</a>
                    <a class="text-primary-500 hover:underline" href="{{ route('sitemap') }}">نقشه سایت</a>
                    <a class="text-primary-500 hover:underline" href="{{ route('contact') }}">تماس با ما</a>
                </nav>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span>
                        <span>{{ verta()->format('Y') }} &copy;</span>
                        تمامی حقوق محفوظ است.
                    </span>
                    <span class="mt-3">
                        طراحی، توسعه و نگهداری با
                        <a href="https://hesamrad.com" target="_blank" class="text-primary-500 hover:underline">
                            حسام راد
                        </a>
                    </span>
                </div>

                <div>
                    <span>
                        ساخته شده با
                        <i class="fa-solid fa-heart text-red-600"></i>
                        برای ایران.
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/3aa580010a.js" crossorigin="anonymous"></script>
</body>

</html>
