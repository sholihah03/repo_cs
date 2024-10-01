@extends('cs.layouts.main')
@section('title', 'index')

<br><br>
 <!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 flex justify-center">
              <div class="relative flex flex-col items-center">
                <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"><br>
          <div class="text-center mt-20">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
              Jenna Stones
            </h3>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              Los Angeles, California
            </div>
          </div>
          <style>
            /* Hilangkan spinner di input number */
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            
            input[type="number"] {
                -moz-appearance: textfield;
            }
          </style>

          <section>
            <!-- component -->
            <div class="flex justify-center items-center min-h-screen">
              <div class="bg-purple-50 shadow-xl rounded-lg p-6 max-w-sm w-full">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 text-center">Pemasukan Harian</h2>
              
                <div class="flex space-x-4">
                  <!-- Form Input Pertama -->
                  <div class="w-1/2">
                    <label for="input1" class="block text-sm font-medium">Masukkan Data 1</label>
                    <input id="input1" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                  </div>
              
                  <!-- Form Input Kedua -->
                  <div class="w-1/2">
                    <label for="input2" class="block text-sm font-medium">Masukkan Data 2</label>
                    <input id="input2" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                  </div>
                </div>
          
                <!-- Penempatan Tombol Submit di Tengah -->
                <div class="flex justify-center mt-4">
                  <button class="inline-flex items-center gap-2 rounded-full border border-blue-400 px-6 py-2 text-sm font-semibold text-blue-500 transition-all hover:bg-blue-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Submit
                  </button>
                </div>
          
                <!-- Form Dropdown di atas Produk -->
                <div class="mt-6">
                  <div class="flex items-center justify-between space-x-4">
                    <!-- Label Produk -->
                    <div class="flex items-center space-x-2">
                      <label for="selectOption" class="block text-sm font-medium">Produk</label>
                    </div>
                  
                    <!-- Form Input Angka -->
                    <div class="flex items-center space-x-1">
                      <!-- Tombol Decrease (-) -->
                      <button id="decrease" class="px-1 py-1 bg-purple-200 border border-purple-300 rounded-md text-purple-700 text-sm font-semibold hover:bg-purple-200 focus:outline-none">
                        -
                      </button>
                  
                      <!-- Input Angka -->
                      <input id="numberInput" type="number" value="1" class="w-10 p-1 border border-gray-300 rounded-md text-center text-gray-700 no-spin text-sm" readonly>
                  
                      <!-- Tombol Increase (+) -->
                      <button id="increase" class="px-1 py-1 bg-purple-200 border border-purple-300 rounded-md text-purple-700 text-sm font-semibold hover:bg-purple-200 focus:outline-none">
                        +
                      </button>
                    </div>
                  </div><br>
                  
                  <select id="selectOption" class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                  </select>
                </div>
          
                <div class="mt-6">
                  <div class="flex items-start justify-between space-x-4">
                    <div class="flex items-center space-x-2">
                      <img src="profile-pic.jpg" alt="Kathy Miller" class="w-8 h-8 rounded-full">
                      <div>
                        <p class="text-sm font-medium">Kathy Miller</p>
                        <p class="text-xs text-gray-500">@KittyKatmills</p>
                      </div>
                    </div>
                    
                                 
                  </div>
                </div>
                  <!-- Penempatan Tombol Submit di Tengah -->
                  <div class="flex justify-center mt-4">
                    <button class="inline-flex items-center gap-2 rounded-full border border-blue-400 px-6 py-2 text-sm font-semibold text-blue-500 transition-all hover:bg-blue-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                      Submit
                    </button>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>



        <script>
            feather.replace()
        </script>

<script>
    // Ambil elemen-elemen tombol dan input
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const numberInput = document.getElementById('numberInput');
  
    // Fungsi untuk mengurangi nilai
    decreaseButton.addEventListener('click', function() {
      let currentValue = parseInt(numberInput.value);
      if (currentValue > 0) { // Cegah nilai negatif
        numberInput.value = currentValue - 1;
      }
    });
  
    // Fungsi untuk menambah nilai
    increaseButton.addEventListener('click', function() {
      let currentValue = parseInt(numberInput.value);
      numberInput.value = currentValue + 1;
    });
  </script>
    </body>
</html>
