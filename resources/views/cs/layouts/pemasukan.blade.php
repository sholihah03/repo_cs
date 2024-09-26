@extends('cs.layouts.main')
@section('title', 'Pemasukan')

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

<br><br><br>
<section>
  <!-- component -->
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-xs w-full">
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
        <label for="selectOption" class="block text-sm font-medium mb-2">Produk</label>
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
          
          <div class="flex flex-col items-center space-x-2">
            <div class="flex items-center space-x-2">
              <!-- Tombol Decrease (-) -->
              <button id="decrease" class="px-2 py-1 bg-purple-100 border border-purple-300 rounded-md text-purple-700 font-semibold hover:bg-purple-200 focus:outline-none">-</button>
          
              <!-- Input Angka -->
              <input id="numberInput" type="number" value="1" class="w-12 p-2 border border-gray-300 rounded-md text-center text-gray-700 no-spin" readonly>
          
              <!-- Tombol Increase (+) -->
              <button id="increase" class="px-2 py-1 bg-purple-100 border border-purple-300 rounded-md text-purple-700 font-semibold hover:bg-purple-200 focus:outline-none">+</button>
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

</section>


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

</html>
