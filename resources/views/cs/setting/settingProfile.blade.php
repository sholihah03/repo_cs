@include('cs.setting.indexSetting')
@include('cs.layouts.main')

<body>
    <div class="bg-white w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
        <main class="flex justify-center items-center w-full min-h-screen py-1">
            <div class="p-2 md:p-4">
                <div class="w-full bg-purple-100 shadow-lg px-6 pb-8 mt-20 sm:max-w-full sm:rounded-lg pt-4">
                    <h2 class="pl-6 text-2xl font-bold sm:text-xl">Setting Profile</h2>

                    <div class="flex flex-col md:flex-row md:space-x-8 mt-8">
                        <div class="flex flex-col items-center space-y-5">
                            <img src="{{ asset('images/profile.png') }}" alt="Foto Profil" style="width: 120px; height: 120px" class="object-cover p-1 bg-white rounded-full ring-1 ring-indigo-300 dark:ring-indigo-500">
                            <div class="flex flex-col items-center space-y-3">
                                <button type="button" class="py-2 px-4 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 transition duration-200 ease-in-out transform hover:scale-105 focus:z-10 focus:ring-4 focus:ring-indigo-200 whitespace-nowrap">
                                    Ganti foto
                                </button>
                                <button type="button" class="py-2 px-4 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 transition duration-200 ease-in-out transform hover:text-[#202142] hover:scale-105 focus:z-10 focus:ring-4 focus:ring-indigo-200 whitespace-nowrap">
                                    Hapus foto
                                </button>
                            </div>
                        </div>

                        <div class="mt-8 md:mt-0 text-[#202142] w-full">
                            <h3 class="text-lg font-semibold text-indigo-900 mb-2">Profile</h3>
                            <form action="{{ route ('storeProfile.cs') }}" method="POST">
                                @csrf
                                <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="username" class="block mb-2 text-sm font-medium text-indigo-900">Username</label>
                                        <input type="text" name="username" id="username" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Username" value="{{ $cs ? $cs->username : '' }}" required>
                                    </div>
                                    <div class="w-full">
                                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-indigo-900">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Nama Lengkap" value="{{ $cs ? $cs->nama_lengkao : '' }}" required>
                                    </div>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-indigo-900">Email Anda</label>
                                    <input type="email" name="email" id="email" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="your.email@gmail.com" value="{{ $cs ? $cs->email : '' }}" required>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="no_telepon" class="block mb-2 text-sm font-medium text-indigo-900">No Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="No Telepon" value="{{ $cs ? $cs->no_telepon : '' }}" required>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-8 md:mt-0 text-[#202142] w-full">
                            <!-- Bagian reset password -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-indigo-900 mb-2">Reset Password</h3>
                                <form action="b" method="POST">
                                    @csrf
                                    <div class="flex flex-col space-y-4">
                                        <div class="w-full">
                                            <label for="current_password" class="block mb-2 text-sm font-medium text-indigo-900">Password Saat Ini</label>
                                            <input type="password" name="current_password" id="current_password" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan password saat ini" required>
                                        </div>

                                        <div class="w-full">
                                            <label for="new_password" class="block mb-2 text-sm font-medium text-indigo-900">Password Baru</label>
                                            <input type="password" name="new_password" id="new_password" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan password baru" required>
                                        </div>

                                        <div class="w-full">
                                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-indigo-900">Konfirmasi Password Baru</label>
                                            <input type="password" name="new_password_confirmation" id="confirm_password" class="border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Konfirmasi password baru" required>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

