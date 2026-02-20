<!DOCTYPE html>
<html lang="en">

@php
    dd($profile->links);

    $pageTitle = $profile->title;

    if (!empty($profile->position)) {
        $pageTitle .= ' - ' . $profile->position;
    }
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite(['resources/css/profile.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="profile relative h-[calc(100vh-130px)] overflow-auto px-0 sm: px-3 md:px-3">
        <div class="my-3">
            <div class="profile-cover mb-3 bg-gray-100 flex justify-center align-middle">
                <img src="{{ $profile->cover?->getFullUrl() }}"
                    onerror="this.src='{{ Vite::asset('resources/images/dummy-cover.png') }}'"
                    alt="{{ $profile->title }}" />

                <div class="absolute -bottom-13 right-auto left-auto">
                    <img src="{{ $profile->thumbnail?->getFullUrl() }}"
                        onerror="this.src='{{ Vite::asset('resources/images/dummy-thumbnail.png') }}'"
                        alt="{{ $profile->title }}"
                        class="rounded-full w-28 h-28 border-3 border-white dark:border-black" />
                </div>
            </div>

            <div class="profile-header flex justify-center items-center text-center mt-15 mb-6">
                <div>
                    <h1 class="font-bold text-lg">{{ $profile->title }}</h1>
                    <h3 class="text-sm">{{ $profile->position }}</h3>
                </div>
            </div>

            <div>
                @markdown($profile->bio)
                <div class="mt-3">
                    @if (!empty($profile->links))
                        @foreach ($profile->links as $link)
                            @if ($link['label'] && $link['location'])
                                <a href="{{ $link['location'] }}" target="_blank"
                                    class="text-center justify-center bg-base-content text-base-100 flex w-full items-center border gap-4 rounded-xl px-6 py-3 bg-black text-white mb-3">
                                    <span class="icon text-sm">
                                        <i class="fas fa-link"></i>
                                    </span>
                                    <span>{{ $link['label'] }}</span>
                                </a>
                            @endif
                        @endforeach
                    @endif
                    <button id="copy-url-btn" class="cursor-pointer text-center justify-center bg-base-content text-base-100 flex w-full items-center border gap-4 rounded-xl px-6 py-3">
                        <span class="copy-text">
                            <i class="fa-regular fa-copy ml-3"></i>
                            <span id="copy-text">کپی تک‌وند در حافظه</span>
                        </span>
                        <span class="copied-text" style="display: none;">
                            <i class="fa-solid fa-check ml-2"></i>
                            <span>کپی شد!</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-100 py-10">
        <div class="container mx-auto">
            <div class="flex flex-col w-full items-center justify-between">
                <small class="mb-1">
                    قدرت گرفته از <a href="{{ config('app.url') }}" class="text-primary-500">پیوند</a>
                </small>
                <small>
                    <span>{{ verta()->format('Y') }} &copy;</span>
                    تمامی حقوق محفوظ است.
                </small>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyBtn = document.getElementById('copy-url-btn');
            if (!copyBtn) return;

            copyBtn.addEventListener('click', function() {
                const postUrl = window.location.href;

                navigator.clipboard.writeText(postUrl).then(() => {
                    const copyText = copyBtn.querySelector('.copy-text');
                    const copiedText = copyBtn.querySelector('.copied-text');

                    copyText.style.display = 'none';
                    copiedText.style.display = 'inline';

                    setTimeout(() => {
                        copyText.style.display = 'inline';
                        copiedText.style.display = 'none';
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/3aa580010a.js" crossorigin="anonymous"></script>
</body>

</html>
