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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <!-- ===== Header Start ===== -->
    <header class="w-full bg-purple-400 bg-opacity-90 backdrop-blur-lg shadow-lg fixed top-0 z-50">
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center">
      <a href="index.html">
        <img class="om" src={{ asset('Porto/Porto/assets/image/logo-light.svg') }} alt="Logo Light" />
        <img class="xc nm" src="images/logo-dark.svg" alt="Logo Dark" />
      </a>

      <!-- Hamburger Toggle BTN -->
      <button class="po rc" @click="navigationOpen = !navigationOpen">
        <span class="rc i pf re pd">
          <span class="du-block h q vd yc">
            <span class="rc i r s eh um tg te rd eb ml jl dl" :class="{ 'ue el': !navigationOpen }"></span>
            <span class="rc i r s eh um tg te rd eb ml jl fl" :class="{ 'ue qr': !navigationOpen }"></span>
            <span class="rc i r s eh um tg te rd eb ml jl gl" :class="{ 'ue hl': !navigationOpen }"></span>
          </span>
          <span class="du-block h q vd yc lf">
            <span class="rc eh um tg ml jl el h na r ve yc" :class="{ 'sd dl': !navigationOpen }"></span>
            <span class="rc eh um tg ml jl qr h s pa vd rd" :class="{ 'sd rr': !navigationOpen }"></span>
          </span>
        </span>
      </button>
      <!-- Hamburger Toggle BTN -->
    </div>

    <div class="vd wo/4 sd qo f ho oo wf yf" :class="{ 'd hh rm sr td ud qg ug jc yh': navigationOpen }">
      <nav>
        <ul class="tc _o sf yo cg ep text-white">
          <li><a href="index.html" class="xl" :class="{ 'mk': page === 'home' }">Home</a></li>
          <li><a href="index.html#features" class="xl">Features</a></li>
          <li class="c i" x-data="{ dropdown: false }">
            <a href="#" class="xl tc wf yf bg" @click.prevent="dropdown = !dropdown"
              :class="{ 'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' || page === 'signup' || page === '404' }">
              Pages
              <svg :class="{ 'wh': dropdown }" class="th mm we fd pf" style="fill: white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
              </svg>
            </a> 
            <!-- Dropdown Start -->
            <ul class="a" :class="{ 'tc': dropdown }">
              <li><a href="blog-grid.html" class="xl" :class="{ 'mk': page === 'blog-grid' }">Blog Grid</a></li>
              <li><a href="blog-single.html" class="xl" :class="{ 'mk': page === 'blog-single' }">Blog Single</a></li>
              <li><a href="signin.html" class="xl" :class="{ 'mk': page === 'signin' }">Sign In</a></li>
              <li><a href="signup.html" class="xl" :class="{ 'mk': page === 'signup' }">Sign Up</a></li>
              <li><a href="404.html" class="xl" :class="{ 'mk': page === '404' }">404</a></li>
            </ul>
            <!-- Dropdown End -->
          </li>
          <li><a href="index.html#support" class="xl">Support</a></li>
        </ul>
      </nav>

      <div class="tc wf ig pb no">
        <div class="pc h io pa ra" :class="navigationOpen ? '!-ud-visible' : 'd'">
          <label class="rc ab i">
            <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode" class="pf vd yc uk h r za ab" />
            <!-- Icon Sun -->
            <svg :class="{ 'wn' : page === 'home', 'xh' : page === 'home' && stickyMenu }" class="th om" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0908 18.6363C10.3549 18.6363 8.69 17.9467 7.46249 16.7192C6.23497 15.4916 5.54537 13.8268 5.54537 12.0908C5.54537 10.3549 6.23497 8.69 7.46249 7.46249C8.69 6.23497 10.3549 5.54537 12.0908 5.54537C13.8268 5.54537 15.4916 6.23497 16.7192 7.46249C17.9467 8.69 18.6363 10.3549 18.6363 12.0908C18.6363 13.8268 17.9467 15.4916 16.7192 16.7192C15.4916 17.9467 13.8268 18.6363 12.0908 18.6363ZM12.0908 16.4545C13.2481 16.4545 14.358 15.9947 15.1764 15.1764C15.9947 14.358 16.4545 13.2481 16.4545 12.0908C16.4545 10.9335 15.9947 9.8236 15.1764 9.00526C14.358 8.18692 13.2481 7.72718 12.0908 7.72718C10.9335 7.72718 9.8236 8.18692 9.00526 9.00526C8.18692 9.8236 7.72718 10.9335 7.72718 12.0908C7.72718 13.2481 8.18692 14.358 9.00526 15.1764C9.8236 15.9947 10.9335 16.4545 12.0908 16.4545ZM10.9999 0.0908203H13.1817V3.36355H10.9999V0.0908203ZM10.9999 20.8181H13.1817V24.0908H10.9999V20.8181ZM2.83446 4.377L4.377 2.83446L6.69082 5.14828L5.14828 6.69082L2.83446 4.37809V4.377ZM17.4908 19.0334L19.0334 17.4908L21.3472 19.8046L19.8046 21.3472L17.4908 19.0334ZM19.8046 2.83337L21.3472 4.377L19.0334 6.69082L17.4908 5.14828L19.8046 2.83446V2.83337ZM5.14828 17.4908L6.69082 19.0334L4.377 21.3472L2.83446 19.8046L5.14828 17.4908ZM24.0908 10.9999V13.1817H20.8181V10.9999H24.0908ZM3.36355 10.9999V13.1817H0.0908203V10.9999H3.36355Z" fill=""/>
            </svg>
            <!-- Icon Sun -->
            <img class="xc nm" src="images/icon-moon.svg" alt="Moon" />
          </label>
        </div>

        <a href="signin.html" :class="{ 'nk yl' : page === 'home', 'ok' : page === 'home' && stickyMenu }" class="ek pk xl">Sign In</a>
        <a href="signup.html" :class="{ 'hh/[0.15]' : page === 'home', 'sh' : page === 'home' && stickyMenu }" class="lk gh dk rg tc wf xf _l gi hi">Sign Up</a>
      </div>
    </div>
  </div>
</header>
<br><br><br>

    <body class="bg-gray-100">
        
        <section class="py-10 md:py-16">

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