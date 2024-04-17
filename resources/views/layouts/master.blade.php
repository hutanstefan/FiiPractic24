<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @yield('head')

</head>
<body>

@if(session('alert'))
    <div class='alert'>{{ session('alert') }}</div>
@endif

<header>

    <nav class="fixed top-0 left-0 w-full z-10 bg-gray-800 mb-0">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">

                            <a href="{{route('products.allproducts')}}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>

                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @auth


                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Account <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm">{{ auth()->user()->name }}</span>
                            <span class="block text-sm font-medium text-gray-900 truncate">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdown">
                            <li>
                                @if(auth()->user()->type === 'admin')
                                    <a href="{{route('adminPanel')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Admin Panel</a>
                                    <a href="{{route('products.pendingProducts')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Accept Products</a>
                                @elseif(auth()->user()->type === 'buyer')
                                    <a href="{{ route('messages.all_chats') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" aria-current="page">Chats</a>
                                    <a href="{{ route('products.favoriteProducts') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" aria-current="page">Favorite Products</a>
                                @elseif(auth()->user()->type === 'seller')
                                    <a href="{{ route('messages.all_chats') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" aria-current="page">Chats</a>
                                    <a href="{{route('products.myproducts')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">My Products</a>
                                    <a href="{{route('products.create')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sell Products</a>
                                @endif
                            </li>

                            <li>
                                <a href="{{route('edit_profile')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Edit Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                            </li>
                        </ul>
                    </div>
                    @else
                        <a href="/login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Login</a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
            </div>
        </div>
    </nav>
</header>

<section id='main'>
    @yield('content')
</section>

<footer class="fixed bottom-0 left-0 w-full text-center bg-gray-800 text-white py-4 mt-2 sm:mt-5">
        <p class="text-center text-sm">
            <span class="font-bold">&copy;</span> Made by <span class="italic">Hutan Stefan</span> | <span class="uppercase">FII PRACTIC 2024</span>
            <br>
            Built with help of <a href="https://www.cloudlab-solutions.com/company" target="_blank" class="underline hover:text-gray-300">CloudLab</a>
        </p>
</footer>

</body>
</html>
