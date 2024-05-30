<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased flex flex-col h-screen">
<div class="flex flex-1 overflow-hidden">

    {{-- Sidebar --}}
    <aside class="hidden md:flex flex-col bg-gray-100 sm:w-[22rem] w-full">

        <header class=" bg-tinder  py-5 flex items-center p-2.5 sticky top-0">

            <x-avatar class="w-10 h-10" />


            <div class="ml-auto flex items-center gap-3">

                {{-- Suitcase icon BI --}}
                <span class="bg-black/40 p-2.5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-suitcase-lg-fill text-white w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M7 0a2 2 0 0 0-2 2H1.5A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14H2a.5.5 0 0 0 1 0h10a.5.5 0 0 0 1 0h.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2H11a2 2 0 0 0-2-2zM6 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1zM3 13V3h1v10zm9 0V3h1v10z" />
                        </svg>
                    </span>

                {{-- Shield icon BI --}}
                <span class="bg-black/40 p-2.5 rounded-full">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-shield-fill  text-white w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                        </svg>
                    </span>

            </div>

        </header>

        {{-- TABS SECTION --}}
        <section class=" mb-4 overflow-y-auto overflow-x-scroll relative" x-data="{ tab: '2' }">

            <header class=" flex  items-center gap-5 mb-2 p-4 sticky top-0 bg-white  z-10">
                <button @click="tab = '1'" :class="{ 'border-b-2 border-red-500': tab == '1'}"
                        class=" font-bold text-sm px-2 pb-1.5">
                    Matches

                    <span class="rounded-full text-xs p-1 px-2 font-bold text-white bg-tinder ">
                            12
                        </span>
                </button>
                <button @click="tab = '2'" :class="{ 'border-b-2 border-red-500': tab == '2'}"
                        class=" font-bold text-sm px-2 pb-1.5">
                    Messages

                    <span class="rounded-full text-xs p-1 px-2 font-bold text-white bg-tinder ">
                            5
                        </span>
                </button>
            </header>

            <main>
                <aside class="px-2" x-show="tab == '1'" x-cloak>
                    <div class="grid grid-cols-3 gap-2">

                        @for ($i = 0; $i < 1; $i++) <div class="relative">
                            {{-- Dots BI --}}
                            <span class="-top-6 -right-5 absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-dot text-red-500 w-12 h-12" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                    </svg>
                                </span>
                            <img class="h-36 rounded-lg object-cover"
                                 src="https://source.unsplash.com/200x200?face-woman-{{$i}}" alt="match">
                            <h5 class="absolute bottom-2 left-2 text-white font-bold text-xs">
                                {{fake()->name}}
                            </h5>
                        </div>
                        @endfor
                    </div>

                </aside>
                <aside x-show="tab == '2'" x-cloak>

                    <ul class=" ">

                        @for ($i = 0; $i < 10; $i++) <li>
                            <a @class(['flex gap-4 items-center p-2','border-r-4 border-red-500 bg-white py-3'=> $i==3?true:false ])
                               href="#">
                                <div class="relative">
                                    {{-- Dots BI --}}
                                    <span class="inset-y-0 my-auto -right-7 absolute">
                                    <svg @class([ 'bi bi-dot w-14 h-14 stroke-[0.3px] stroke-white '
                                        , 'hidden'=>$i==3?false:true,
                                        'text-green-500'=>fake()->randomElement([true,false]), {{-- Active last 24 hours--}}
                                        'text-red-500'=>fake()->randomElement([true,false]), {{-- New match/ unread messages--}}
                                        ])
                                         xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                    </svg>
                                </span>

                                    <x-avatar class="w-14 h-14" src="https://source.unsplash.com/200x200?face-girl-{{$i}}" />

                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="font-bold truncate"> {{fake()->name}} </h6>
                                    <p class="text-gray-600 truncate"> {{fake()->text}} </p>
                                </div>
                            </a>

                        </li>
                        @endfor

                    </ul>

                </aside>
            </main>
        </section>

    </aside>


    <main class=" flex-1 flex-col overflow-y-auto  w-full flex">
        {{$slot}}
    </main>
</div>
@livewireScripts
</body>

</html>
