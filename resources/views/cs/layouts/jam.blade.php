<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Clock</title>
    <style>
        /* Styling untuk jam agar lebih terlihat */
        #clock {
            font-size: 2em;
            font-weight: bold;
            color: #333;
            margin: 20px;
        }
    </style>
</head>
<body>

    <div id="clock"></div>

    <script>
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
        }

        // Memperbarui jam setiap detik
        setInterval(updateClock, 1000);

        // Jalankan fungsi updateClock saat halaman pertama kali dimuat
        updateClock();
    </script>

</body>
</html>
