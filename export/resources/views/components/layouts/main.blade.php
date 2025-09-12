<!doctype html>
<html lang="{{ $site->short_locale }}">
<head>
    <!--
    ======================================================================================
    == Lovingly brought to you by mindtwo GmbH (https://www.mindtwo.de/) =================

     _____ ______    ___   ________    ________   _________   ___       __    ________
    |\   _ \  _   \ |\  \ |\   ___  \ |\   ___ \ |\___   ___\|\  \     |\  \ |\   __  \
    \ \  \\\__\ \  \\ \  \\ \  \\ \  \\ \  \_|\ \\|___ \  \_|\ \  \    \ \  \\ \  \|\  \
     \ \  \\|__| \  \\ \  \\ \  \\ \  \\ \  \ \\ \    \ \  \  \ \  \  __\ \  \\ \  \\\  \
      \ \  \    \ \  \\ \  \\ \  \\ \  \\ \  \_\\ \    \ \  \  \ \  \|\__\_\  \\ \  \\\  \
       \ \__\    \ \__\\ \__\\ \__\\ \__\\ \_______\    \ \__\  \ \____________\\ \_______\
        \|__|     \|__| \|__| \|__| \|__| \|_______|     \|__|   \|____________| \|_______|

    =======================================================================================
    == Hi awesome developer! ==============================================================
    == You want to join our nerd-cave and deploy state of the art web applications? =======
    == Then take a look at our career page at https://www.mindtwo.de/karriere/ ============
    =======================================================================================
    -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $metadata->page_title ?? $title }} ‹ {{ config('app.name') }}</title>

    @if (!empty($metadata->meta_robots ?? $robots))
        <meta name="robots" content="{{ $metadata->meta_robots ?? $robots }}">
    @endif
    @if (!empty($metadata->meta_description ?? $description))
        <meta name="description" content="{{ $metadata->meta_description ?? $description }}">
    @endif
    @if(!empty($metadata->meta_canonical ?? $canonical))
        <link rel="canonical" href="{{ $metadata->meta_canonical ?? $canonical }}">
    @endif
    @if (!empty($metadata->og_title))
        <meta property="og:title" content="{{ $metadata->og_title }}">
    @endif
    @if (!empty($metadata->og_description))
        <meta property="og:description" content="{{ $metadata->og_description }}">
    @endif
    @if (!empty($metadata->og_url))
        <meta property="og:url" content="{{ $metadata->og_url }}">
    @endif
    @if (!empty($metadata->og_image))
        <meta property="og:image" content="{{ $metadata->og_image }}">
    @endif
    @if (!empty($metadata->og_type))
        <meta property="og:type" content="{{ $metadata->og_type }}">
    @endif
    @if (!empty($metadata->og_site_name))
        <meta property="og:site_name" content="{{ $metadata->og_site_name }}">
    @endif


    <link rel="preload" href="/fonts/OpenSans-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/OpenSans-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/OpenSans-Bold.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/fonts/RecklessNeue-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/RecklessNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>

    <style>
        @font-face {
            font-family: "OpenSans";
            src: url("/fonts/OpenSans-Regular.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "OpenSans";
            src: url("/fonts/OpenSans-SemiBold.woff2") format("woff2");
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "OpenSans";
            src: url("/fonts/OpenSans-Bold.woff2") format("woff2");
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "RecklessNeue";
            src: url("/fonts/RecklessNeue-Regular.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "RecklessNeue";
            src: url("/fonts/RecklessNeue-Medium.woff2") format("woff2");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
    </style>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#3e4a40">

    @vite(['resources/js/site.js', 'resources/css/site.css'])

    @stack('scripts')
    @stack('schema')
</head>
<body class="font-sans">
    <header class="bg-black" x-data="{ navOpen: false }">
        <x-container>
            <div class="flex justify-between items-center lg:h-full">
                @if($isHomepage)
                    <span class="logo text-4xl font-bold text-white">
                        <svg class="w-[200px] h-auto">
                            <use xlink:href="#logo"></use>
                        </svg>
                    </span>
                @else
                    <a href="{{ $homepageUrl }}" class="logo text-4xl font-bold text-white">
                        <svg  class="w-[200px] h-auto">
                            <use xlink:href="#logo"></use>
                        </svg>
                    </a>
                @endif

                <div class="flex gap-8 items-center" :class="navOpen ? 'flex lg:flex' : 'hidden lg:flex'">
                    <nav class="[&_ul]:flex [&_ul]:gap-x-8 [&_ul]:text-white" :class="navOpen ? '[&_ul]:flex-col [&_ul]:text-center' : ''" aria-label="{{ trans('base.main_navigation') }}">
                        @include('partials.navigation', ['nav' => $primaryNav])
                    </nav>

                    @include('partials.language-menu')
                </div>

                <button
                    @click="navOpen = !navOpen"
                    class="lg:hidden p-2 text-white"
                    :aria-expanded="navOpen"
                    aria-controls="main-navigation"
                    aria-label="{{ trans('base.open_navigation') }}"
                >
                    <svg class="w-6 h-6" aria-hidden="true">
                        <use xlink:href="#menu"></use>
                    </svg>
                </button>
            </div>
        </x-container>
    </header>

    <main class="grid grid-cols-1 gap-y-24 py-24">
        {{ $slot }}
    </main>

    <footer class="bg-black text-white py-6">
        <x-container>
            <div class="flex flex-wrap gap-y-8 justify-center md:justify-between md:items-center">
                <p class="font-mono">
                    $ build --with="❤️"️ --by="<a href="https://www.mindtwo.de" class="underline" target="_blank" rel="noopener noreferrer">mindtwo GmbH</a>";</span>
                </p>
                <nav class="[&_ul]:flex [&_ul]:gap-x-8" aria-label="{{ trans('base.footer_navigation') }}">
                    @include('partials.navigation', ['nav' => $footerNav])
                </nav>
            </div>
        </x-container>
    </footer>

    @include('partials.svgs')
</body>
</html>
