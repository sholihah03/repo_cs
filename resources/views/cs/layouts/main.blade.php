<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CS</title>
    <link rel="stylesheet" href="{{ asset('Porto/Porto/assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('Porto/Porto/assets/css/nav.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-gray-100">
    <!-- ===== Header Start ===== -->
    <nav class="w-full bg-purple-300 bg-opacity-90 backdrop-blur-lg shadow-lg fixed top-0 z-50">
        <div class="flex items-center justify-between p-4">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="index.html">
                    <img class="om" src="{{ asset('Porto/Porto/assets/image/logo-light.svg') }}" alt="Logo Light" />
                </a>
            </div>

            <!-- Notification, Profile, and Sign In Button for Larger Screens -->
            <div class="hidden lg:flex items-center space-x-4">
                <!-- Notification Icon -->
                <a href="#" class="relative">
                    <i data-feather="bell" class="text-black" style="width: 28px; height: 28px;"></i>
                    <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1.5 py-0.5">3</span>
                </a>

                <!-- Profile Icon -->
                <a href="{{ route('settingcs') }}">
                    <i data-feather="user" class="text-black" style="width: 28px; height: 28px;"></i>
                </a>

                <!-- Sign In Button -->
                <a href="{{ route('login') }}" class="px-4 py-2 bg-purple-500 text-white rounded">Logout</a>
            </div>

            <!-- Burger Menu for Mobile -->
            <div class="lg:hidden ml-auto" x-data="{ navigationOpen: false }">
                <button @click="navigationOpen = !navigationOpen" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16" stroke="white" /> <!-- Garis 1 -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" stroke="white" /> <!-- Garis 2 -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16" stroke="white" /> <!-- Garis 3 -->
                    </svg>
                </button>

                <!-- Dropdown Navigation -->
                <div x-show="navigationOpen" @click.away="navigationOpen = false" x-transition
                    class="absolute right-0 top-full bg-white w-38 p-4 shadow-lg z-40">
                    <nav>
                        <ul class="space-y-4 text-black">
                            <!-- Notification Icon -->
                            <li>
                                <a href="#" class="relative">
                                    <i data-feather="bell" class="text-black" style="width: 28px; height: 28px;"></i>
                                    <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1.5 py-0.5">3</span>
                                </a>
                            </li>
                            <!-- Profile Icon -->
                            <li>
                                <a href="{{ route('settingcs') }}">
                                    <i data-feather="user" class="text-black" style="width: 28px; height: 28px;"></i>
                                </a>
                            </li>
                            <!-- Sign In Button -->
                            <li>
                                <a href="signin.html" class="px-4 py-2 bg-purple-500 text-white rounded block text-center">Sign In</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <script>
        feather.replace()
    </script>

</body>

</html>
