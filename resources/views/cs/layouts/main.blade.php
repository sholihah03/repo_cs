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
    <nav class="w-full bg-purple-600 bg-opacity-90 backdrop-blur-lg shadow-lg fixed top-0 z-50">
        <div class="flex items-center justify-between p-4">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('dashboardcs') }}">
                    <div class="w-14 h-14 overflow-hidden rounded-full">
                    @if ($perusahaan && $perusahaan->logo)
                        <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="Logo {{ $perusahaan->nama_perusahaan }}" style="width: 100px; height: auto;">
                    @else
                    <svg class="h-8 w-8 text-white" <svg  viewBox="0 0 24 24"  width="24"  height="24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <rect x="7" y="7" width="3" height="9" />  <rect x="14" y="7" width="3" height="5" /></svg>
                    @endif
                    </div>
                </a>
            </div>
            <div id="notificationContainer" class="hidden">
                <!-- Bagian notifikasi -->
            </div>
            <script>
                const notificationContainer = document.getElementById('notificationContainer');
                const currentHour = new Date().getHours();
            
                if (currentHour >= 11) {
                    notificationContainer.classList.remove('hidden');
                }
            </script>
            
            <!-- Notification, Profile, and Sign In Button for Larger Screens -->
            <div class="hidden lg:flex items-center space-x-4">
                <div class="relative">
                    <!-- Notification Icon -->
                    <button id="notificationToggle" class="relative focus:outline-none">
                        <i data-feather="bell" class="text-white w-7 h-7"></i>
                        @if ($notifications->count() > 0)
                            <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1.5 py-0.5">
                                {{ $notifications->count() }}
                            </span>
                        @endif
                    </button>
         
                    <!-- Dropdown Content -->
                    <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-800">Notifikasi</h4>
                        </div>
                        <ul class="divide-y divide-gray-200 max-h-64 overflow-y-auto">
                            @forelse ($notifications as $notification)
                                <li class="p-4 hover:bg-gray-100">
                                    <p class="text-sm text-gray-700">{{ $notification->target }}</p>
                                    <p class="text-sm text-gray-700">CR New: {{ $notification->hasilcs->cr_new ?? 'Tidak tersedia' }}%</p>
                                    <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="p-4 text-sm text-gray-500">Tidak ada notifikasi baru.</li>
                            @endforelse

                        </ul>
                    </div>
                </div>                
                
                <!-- Profile Icon -->
                <a href="{{ route('settingcs') }}">
                    <i data-feather="user" class="text-white" style="width: 28px; height: 28px;"></i>
                </a>

                <!-- Sign In Button -->
                <a href="{{ route('login') }}" class="px-4 py-2 bg-purple-400 text-white rounded">Logout</a>
            </div>

           <!-- Burger Menu for Mobile --> 
            <div class="lg:hidden ml-auto" x-data="{ navigationOpen: false, notificationOpen: false }">
                <!-- Flex container for aligning the icons -->
                <div class="flex items-center">
                    <!-- Hamburger Menu Icon -->
                    <button @click="navigationOpen = !navigationOpen" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16" stroke="white" /> <!-- Garis 1 -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" stroke="white" /> <!-- Garis 2 -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16" stroke="white" /> <!-- Garis 3 -->
                        </svg>
                    </button>

                    <!-- Notification Icon next to Burger Menu -->
                    <div class="ml-4 relative">
                        <button @click="notificationOpen = !notificationOpen" class="focus:outline-none">
                            <i data-feather="bell" class="text-white w-7 h-7"></i>
                            @if ($notifications->count() > 0)
                                <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1.5 py-0.5">
                                    {{ $notifications->count() }}
                                </span>
                            @endif
                        </button>

                        <!-- Notification Dropdown -->
                        <div x-show="notificationOpen" @click.away="notificationOpen = false" x-transition
                            class="absolute right-0 top-full bg-white w-80 p-4 shadow-lg z-50">
                            <ul class="divide-y divide-gray-200 max-h-64 overflow-y-auto">
                                @forelse ($notifications as $notification)
                                    <li class="p-4 hover:bg-gray-100">
                                        <p class="text-sm text-gray-700">{{ $notification->target }}</p>
                                        <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                    </li>
                                @empty
                                    <li class="p-4 text-sm text-gray-500">Tidak ada notifikasi baru.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Dropdown Navigation (for Burger Menu) -->
                <div x-show="navigationOpen" @click.away="navigationOpen = false" x-transition
                    class="absolute right-0 top-full bg-white w-38 p-4 shadow-lg z-40">
                    <nav>
                        <ul class="space-y-4 text-black">
                            <!-- Profile Icon -->
                            <li>
                                <a href="{{ route('settingcs') }}">
                                    <i data-feather="user" class="text-black" style="width: 28px; height: 28px;"></i>
                                </a>
                            </li>
                            <!-- Sign In Button -->
                            <li>
                                <a href="{{ route('login') }}" class="px-4 py-2 bg-purple-500 text-white rounded">Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <script>
        feather.replace()
        function submitTargetNotification() {
    // Ambil nilai dari input CrNew dan Status Target
    const crNewValue = document.getElementById('crNewTarget').value;
    const targetStatusValue = document.getElementById('targetStatus').textContent;

    // Validasi jika data kosong
    if (!crNewValue || !targetStatusValue) {
        alert('Pastikan data CrNew dan Status Target telah terisi.');
        return;
    }

    // Format notifikasi yang akan ditampilkan
    const notificationMessage = `CrNew: ${crNewValue}, Status: ${targetStatusValue}`;

    // Tambahkan notifikasi ke ikon notifikasi
    const notificationIcon = document.querySelector('[data-feather="bell"]');
    const notificationList = document.createElement('div');
    notificationList.classList.add(
        'absolute', 'top-12', 'right-0', 'bg-white', 'shadow-lg', 
        'p-4', 'rounded-lg', 'w-64', 'z-50', 'animate-fade-in'
    );
    notificationList.innerHTML = `
        <div class="flex items-center space-x-2">
            <span class="text-purple-600 font-bold">Notifikasi Baru</span>
        </div>
        <div class="mt-2 text-gray-800 text-sm">
            ${notificationMessage}
        </div>
    `;

    // Tampilkan notifikasi
    const existingNotification = document.getElementById('notification-content');
    if (existingNotification) {
        existingNotification.remove(); // Hapus notifikasi lama jika ada
    }
    notificationList.id = 'notification-content';
    notificationIcon.parentNode.appendChild(notificationList);

    // Timer untuk otomatis menghilangkan notifikasi setelah 5 detik
    setTimeout(() => {
        if (notificationList) {
            notificationList.remove();
        }
    }, 5000);
}
  // Fungsi untuk mengatur dropdown
  function setupDropdown(toggleId, dropdownId) {
        const toggle = document.getElementById(toggleId);
        const dropdown = document.getElementById(dropdownId);

        if (toggle && dropdown) {
            toggle.addEventListener("click", () => {
                dropdown.classList.toggle("hidden");
            });

            // Klik di luar untuk menutup dropdown
            document.addEventListener("click", (event) => {
                if (!toggle.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        } else {
            console.error(`Element with ID ${toggleId} or ${dropdownId} not found.`);
        }
    }

    // Inisialisasi Dropdown Notifikasi
    document.addEventListener("DOMContentLoaded", function () {
        setupDropdown("notificationToggle", "notificationDropdown");
    });

    </script>

</body>

</html>

