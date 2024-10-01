@include('cs.setting.indexSetting')
@include('cs.layouts.main')

<body>
    <div class="bg-white w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
        <main class="flex justify-center items-center w-full min-h-screen py-1">
            <div class="p-2 md:p-4">
                <!-- Card Wrapper with Transparent Background -->
                <div class="w-full bg-purple-100 shadow-lg px-6 pb-8 mt-20 sm:max-w-full sm:rounded-lg pt-4">
                    <h2 class="pl-6 text-2xl font-bold sm:text-xl">Setting Profile</h2>

                    <div class="flex flex-col md:flex-row md:space-x-8 mt-8">
                        <div class="flex flex-col items-center space-y-5">
                            {{-- <img class="object-cover w-40 h-40 p-1 bg-white rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                                src="" alt="Foto Profil"> --}}
                                <svg class="object-cover w-40 h-40 p-1 bg-white rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 73.825a182.175 182.175 0 1 0 182.18 182.18A182.177 182.177 0 0 0 256 73.825zm0 71.833a55.05 55.05 0 1 1-55.054 55.046A55.046 55.046 0 0 1 256 145.658zm.52 208.723h-80.852c0-54.255 29.522-73.573 48.885-90.906a65.68 65.68 0 0 0 62.885 0c19.363 17.333 48.885 36.651 48.885 90.906z" data-name="Profile"/></svg>
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
                            <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                <div class="w-full">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-900">Username</label>
                                    <input type="text" id="first_name" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Nama depan Anda" value="" required>
                                </div>
                                <div class="w-full">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-indigo-900">Nama Lengkap</label>
                                    <input type="text" id="last_name" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Nama belakang Anda" value="" required>
                                </div>
                            </div>

                            <div class="mb-2 sm:mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-indigo-900">Email Anda</label>
                                <input type="email" id="email" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="your.email@gmail.com" required>
                            </div>

                            <div class="mb-2 sm:mb-6">
                                <label for="profession" class="block mb-2 text-sm font-medium text-indigo-900">Jabatan</label>
                                <input type="text" id="profession" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Profesi Anda" required>
                            </div>

                            {{-- <div class="mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-indigo-900">Bio</label>
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-indigo-900  rounded-lg border border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tulis bio Anda di sini..."></textarea>
                            </div> --}}

                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                    Simpan
                                </button>
                            </div>
                        </div>

                        <div class="mt-8 md:mt-0 text-[#202142] w-full">
                            <!-- Bagian reset password -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-indigo-900 mb-2">Reset Password</h3>
                                <div class="flex flex-col space-y-4">
                                    <div class="w-full">
                                        <label for="current_password" class="block mb-2 text-sm font-medium text-indigo-900">Password Saat Ini</label>
                                        <input type="password" id="current_password" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan password saat ini" required>
                                    </div>

                                    <div class="w-full">
                                        <label for="new_password" class="block mb-2 text-sm font-medium text-indigo-900">Password Baru</label>
                                        <input type="password" id="new_password" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan password baru" required>
                                    </div>

                                    <div class="w-full">
                                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-indigo-900">Konfirmasi Password Baru</label>
                                        <input type="password" id="confirm_password" class=" border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Konfirmasi password baru" required>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
