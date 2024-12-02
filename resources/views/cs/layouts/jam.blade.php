<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Clock with Warning</title>
    <style>
        /* Styling untuk jam agar lebih terlihat */
        #clock {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            margin: 20px;
        }

       /* Styling untuk notifikasi */
       #warningNote {
            display: none; /* Sembunyikan secara default */
            margin: 10px auto;
            padding: 8px;
            background-color: rgba(255, 0, 0, 0.1); /* Merah transparan */
            color: #990000; /* Teks merah gelap */
            font-weight: normal;
            border-radius: 4px;
            text-align: center;
            max-width: 250px; /* Membatasi lebar kotak */
            border: 1px solid #990000; /* Border merah gelap */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Memberikan bayangan */
            font-size: 0.9em; /* Ukuran teks lebih kecil */
        }
    </style>
</head>
<body>

    <!-- Elemen untuk jam -->
    <div id="clock"></div>

    <!-- Elemen untuk notifikasi -->
    <div id="warningNote">
        ⚠️ Warning <br>Isi data pemasukan sekarang!
    </div>

    <script>
        let isWarningVisible = false; // Status notifikasi

        // Fungsi untuk memperbarui jam setiap detik
        function updateClock() {
            const now = new Date(); // Mengambil waktu saat ini
            const hours = now.getHours().toString().padStart(2, '0'); // Mengambil jam
            const minutes = now.getMinutes().toString().padStart(2, '0'); // Mengambil menit
            const seconds = now.getSeconds().toString().padStart(2, '0'); // Mengambil detik

            // Format waktu menjadi HH:MM:SS
            const currentTime = `${hours}:${minutes}:${seconds}`;

            // Menampilkan waktu ke dalam elemen dengan id "clock"
            document.getElementById('clock').innerText = currentTime;

            // Periksa apakah saat ini jam 11:00:00 hingga sebelum 13:00:00
            if (hours >= '15' && hours < '16') {
                showWarning(); // Tampilkan warning
            } else {
                hideWarning(); // Sembunyikan warning
            }
        }

        // Fungsi untuk menampilkan notifikasi
        function showWarning() {
            const warningNote = document.getElementById('warningNote');
            if (!isWarningVisible) { // Hanya log jika status berubah
                console.log("Warning muncul pada:", new Date().toLocaleTimeString());
                isWarningVisible = true;
            }
            warningNote.style.display = 'block'; // Tampilkan elemen notifikasi
        }

        // Fungsi untuk menyembunyikan notifikasi
        function hideWarning() {
            const warningNote = document.getElementById('warningNote');
            if (isWarningVisible) { // Hanya log jika status berubah
                console.log("Warning hilang pada:", new Date().toLocaleTimeString());
                isWarningVisible = false;
            }
            warningNote.style.display = 'none'; // Sembunyikan elemen notifikasi
        }

        // Memperbarui jam setiap detik
        setInterval(updateClock, 1000);

        // Jalankan fungsi updateClock saat halaman pertama kali dimuat
        updateClock();
    </script>

</body>
</html>
