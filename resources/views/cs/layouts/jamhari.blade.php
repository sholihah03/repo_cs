<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Clock with Date</title>
    <style>
        /* Styling untuk jam dan tanggal */
        #clock, #date {
            font-size: 2em;
            font-weight: bold;
            color: #333;
            margin: 20px;
        }
    </style>
</head>
<body>

    <!-- Tempat untuk menampilkan jam dan tanggal -->
    <div id="clock"></div>
    <div id="date"></div>

    <script>
        // Fungsi untuk memperbarui jam dan tanggal
        function updateClock() {
            const now = new Date(); // Mengambil waktu saat ini

            // Mengambil jam, menit, dan detik
            const hours = now.getHours().toString().padStart(2, '0'); // Menggunakan format 24-jam
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            // Format waktu menjadi HH:MM:SS
            const currentTime = `${hours}:${minutes}:${seconds}`;
            document.getElementById('clock').innerText = currentTime;

            // Mengambil hari dalam seminggu dan tanggal
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const dayName = days[now.getDay()];

            // Mengambil tanggal, bulan, dan tahun
            const day = now.getDate().toString().padStart(2, '0');
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();

            // Format tanggal menjadi Day, DD Month YYYY
            const currentDate = `${dayName}, ${day} ${monthName} ${year}`;
            document.getElementById('date').innerText = currentDate;
        }

        // Memperbarui jam dan tanggal setiap detik
        setInterval(updateClock, 1000);

        // Jalankan fungsi updateClock saat halaman pertama kali dimuat
        updateClock();
    </script>

</body>
</html>
