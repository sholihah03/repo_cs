<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Porto - Tailwind Template</title>
        {{-- <link rel="stylesheet" href="assets/css/tailwind.css"> --}}
        <link rel="stylesheet" href="{{ asset('Porto/Porto/assets/css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('Porto/Porto/assets/css/nav.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
<!-- ===== Header Start ===== -->
<body class="bg-gray-100">

    <!-- ===== Header Start ===== -->
    <header class="w-full bg-purple-400 bg-opacity-90 backdrop-blur-lg shadow-lg fixed top-0 z-50">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center">
                <a href="index.html">
                    <img class="om" src="{{ asset('Porto/Porto/assets/image/logo-light.svg') }}" alt="Logo Light" />
                </a>
            </div>

            <!-- Navigation for Desktop -->
            <div class="hidden lg:flex items-center space-x-4">
                <nav>
                    <ul class="flex space-x-4 text-white">
                        <li><a href="index.html" class="xl">Home</a></li>
                        <li><a href="index.html#features" class="xl">Features</a></li>
                        <li class="relative" x-data="{ dropdown: false }">
                            <a href="#" class="xl flex items-center" @click.prevent="dropdown = !dropdown">
                                Pages
                                <svg :class="{ 'transform rotate-180': dropdown }" class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                            <ul x-show="dropdown" @click.away="dropdown = false" x-transition class="absolute bg-white text-black mt-2 space-y-2 rounded shadow-lg p-4">
                                <li><a href="blog-grid.html" class="xl">Blog Grid</a></li>
                                <li><a href="blog-single.html" class="xl">Blog Single</a></li>
                                <li><a href="signin.html" class="xl">Sign In</a></li>
                                <li><a href="signup.html" class="xl">Sign Up</a></li>
                                <li><a href="404.html" class="xl">404</a></li>
                            </ul>
                        </li>
                        <li><a href="index.html#support" class="xl">Support</a></li>
                    </ul>
                </nav>
            </div>

            <div class="hidden lg:flex items-center space-x-4">
                <a href="signin.html" class="px-4 py-2 bg-purple-500 text-white rounded">Sign In</a>
                <a href="signup.html" class="px-4 py-2 border border-purple-500 text-purple-500 rounded">Sign Up</a>
            </div>

            <!-- Mobile Menu Button -->
            <div x-data="{ navigationOpen: false }" class="lg:hidden">
                <button @click="navigationOpen = !navigationOpen" class="lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <!-- Mobile Navigation -->
                <div x-show="navigationOpen" @click.away="navigationOpen = false" x-transition class="absolute right-0 bg-white w-50 p-4 shadow-lg z-40">
                    <nav>
                        <ul class="space-y-4 text-black">
                            <li><a href="index.html" class="xl">Home</a></li>
                            <li><a href="index.html#features" class="xl">Features</a></li>
                            <li x-data="{ dropdownMobile: false }">
                                <a href="#" class="xl flex items-center justify-between" @click.prevent="dropdownMobile = !dropdownMobile">
                                    Pages
                                    <svg :class="{ 'transform rotate-180': dropdownMobile }" class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <ul x-show="dropdownMobile" @click.away="dropdownMobile = false" x-transition class="pl-4 space-y-2 mt-2">
                                    <li><a href="blog-grid.html" class="xl">Blog Grid</a></li>
                                    <li><a href="blog-single.html" class="xl">Blog Single</a></li>
                                    <li><a href="signin.html" class="xl">Sign In</a></li>
                                    <li><a href="signup.html" class="xl">Sign Up</a></li>
                                    <li><a href="404.html" class="xl">404</a></li>
                                </ul>
                            </li>
                            <li><a href="index.html#support" class="xl">Support</a></li>
                        </ul>
                    </nav>
                    <div class="mt-4">
                        <a href="signin.html" class="block px-4 py-2 bg-purple-500 text-white rounded">Sign In</a>
                        <a href="signup.html" class="block px-4 py-2 border border-purple-500 text-purple-500 rounded mt-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-10 md:py-16 mt-24">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="text-center">
                <div class="flex justify-center mb-16">
                    <img src="{{ asset('Porto/Porto/assets/image/home-img.png') }}" alt="Image">
                </div>
                <h6 class="font-medium text-gray-600 text-lg md:text-2xl uppercase mb-8">Kate Wolff</h6>
            </div>
        </div>
    </section>

<section>
<!-- component -->
<div class="font-manrope flex h-screen w-full items-center justify-center">
    <div class="mx-auto box-border w-[365px] border bg-white p-4">
      <div class="flex items-center justify-between">
        <span class="text-[#64748B]">Sending Money</span>
        <div class="cursor-pointer border rounded-[4px]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#64748B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
      </div>

      <div class="mt-6">
        <div class="font-semibold">How much would you like to send?</div>
        <div><input class="mt-1 w-full rounded-[4px] border border-[#A0ABBB] p-2" value="100.00" type="text" placeholder="100.00" /></div>
        <div class="flex justify-between">
          <div class="mt-[14px] cursor-pointer truncate rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$10.00</div>
          <div class="mt-[14px] cursor-pointer truncate rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$50.00</div>
          <div class="mt-[14px] cursor-pointer truncate rounded-[4px] border border-green-700 p-3 text-[#191D23]">$100.00</div>
          <div class="mt-[14px] cursor-pointer truncate rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$200.00</div>
        </div>
      </div>

      <div class="mt-6">
        <div class="font-semibold">From</div>
        <div class="mt-2">
          <div class="flex w-full items-center justify-between bg-neutral-100 p-3 rounded-[4px]">
            <div class="flex items-center gap-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#299D37]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="font-semibold">Checking</span>
            </div>

            <div class="flex items-center gap-x-2">
              <div class="text-[#64748B]">card ending in 6678</div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6">
        <div class="flex justify-between">
          <span class="font-semibold text-[#191D23]">Receiving</span>
          <div class="flex cursor-pointer items-center gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="font-semibold text-green-700">Add recipient</div>
          </div>
        </div>

        <div class="flex items-center gap-x-[10px] bg-neutral-100 p-3 mt-2 rounded-[4px]">
          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1507019403270-cca502add9f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
          <div>
            <div class="font-semibold">Kathy Miller</div>
            <div class="text-[#64748B]">@KittyKatmills</div>
          </div>
        </div>
      </div>

      <div class="mt-6">
        <div class="w-full cursor-pointer rounded-[4px] bg-green-700 px-3 py-[6px] text-center font-semibold text-white">Send $100.00</div>
      </div>
    </div>
  </div>
</section>

        <footer class="py-10 md:py-16 mb-20 md:mb-40 lg::mb-52">
            <div class="container max-w-screen-xl mx-auto px-4">
                <div class="text-center">
                    <div class="flex items-center justify-center space-x-8">
                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="twitter" class="text-gray-500 hover:text-gray-800 transition ease-in-out duration-500"></i>
                        </a>

                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="dribbble" class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                        </a>

                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="facebook" class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                        </a>

                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="codepen" class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                        </a>

                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="at-sign" class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                        </a>

                        <a href="#" class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                            <i data-feather="instagram" class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            feather.replace()
        </script>

    </body>
</html>
