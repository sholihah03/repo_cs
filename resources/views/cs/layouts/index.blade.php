@extends('cs.layouts.main')
@section('title', 'index')

 <!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-64"  style="margin-top: -300px;">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 flex justify-center">
              <div class="relative flex flex-col items-center">
                <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg"
                class="shadow-xl rounded-full h-auto align-middle border-none absolute inset-x-15 -m-16 lg:ml-0 max-w-150-px">
                <br>
                <div class="text-center mt-20">
                    <div class="flex justify-center items-center relative">
                        <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700">
                            Jenna Stones
                        </h3>
                        <div class="absolute" style="right: -450px;">
                            @include('cs.layouts.jam')
                        </div>
                    </div>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        Los Angeles, California
                    </div>
                </div>



          <section>
            <!-- component -->
            <div class="flex justify-center items-center min-h-screen">
              <div class="bg-purple-50 shadow-xl rounded-lg p-6 max-w-md w-full">
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
                  <!-- Label Produk -->
                  <div class="mb-2">
                    <label for="selectOption" class="block text-sm font-medium">Produk</label>
                  </div>
                  <!-- Dropdown -->
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

