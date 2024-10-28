<!-- popupPersenblade.php -->
<div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
        <div class="flex justify-between items-center">
            <h6 class="mb-1">Setting Bagi Hasil</h6>
            <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <form action="" method="POST" id="formEdit">
            @csrf
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <!-- Pilih Perusahaan -->
                <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                    <strong class="text-slate-700">Pilih Perusahaan:</strong> &nbsp;
                    <select name="perusahaan_id" class="w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-400">
                        <option value="" disabled selected>Pilih perusahaan</option>
                        @if ($perusahaan && $perusahaan->count())
                            @foreach ($perusahaan as $item)
                                <option value="{{ $item->id_perusahaan }}">{{ $item->nama_perusahaan }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>Tidak ada data perusahaan</option>
                        @endif
                    </select>
                </li>

                <!-- Input Persen Bagi Hasil -->
                <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                    <strong class="text-slate-700">Masukkan Persen Bagi Hasil:</strong> &nbsp;
                    <input type="number" name="persen_bagi_hasil" class="w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-400" min="0" max="100" placeholder="Masukkan persen bagi hasil">
                </li>

                <!-- Tombol Submit -->
                <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                    <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Simpan Data
                    </button>
                </li>
            </ul>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const modal = $('#editModal');

        $('.edit-button').click(function (e) {
            e.preventDefault(); // Mencegah perilaku default

            // Mengambil konten dari file popup
            $.get('path/to/popupPersen.blade.php', function (data) {
                modal.html(data); // Memasukkan konten ke modal
                modal.removeClass('hidden'); // Menampilkan modal

                // Event listener untuk menutup modal
                $('#closeModal').click(function () {
                    modal.addClass('hidden'); // Menyembunyikan modal
                });

                // Event listener untuk menutup modal jika mengklik area di luar modal
                $(window).click(function (event) {
                    if (event.target.id === 'editModal') {
                        modal.addClass('hidden');
                    }
                });
            });
        });
    });
</script>
