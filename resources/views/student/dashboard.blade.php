<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 min-h-screen p-8">

    <h1 class="text-4xl font-bold mb-8 text-gray-800">
        Dashboard Mahasiswa
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-white p-5 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4">
                Mahasiswa per Prodi
            </h2>

            <canvas id="prodiChart"></canvas>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4">
                Mahasiswa per Angkatan
            </h2>

            <canvas id="angkatanChart"></canvas>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4">
                Mahasiswa Lulus
            </h2>

            <canvas id="lulusChart"></canvas>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4">
                Gender Mahasiswa
            </h2>

            <canvas id="genderChart"></canvas>
        </div>

    </div>

    <script>

        new Chart(document.getElementById('prodiChart'), {
            type: 'bar',
            data: {
                labels: ['Informatika', 'Sistem Informasi', 'DKV'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [120, 95, 70],
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b'],
                    borderWidth: 1
                }]
            }
        });

        new Chart(document.getElementById('angkatanChart'), {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024'],
                datasets: [{
                    label: 'Mahasiswa per Angkatan',
                    data: [80, 120, 140, 160],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });

        new Chart(document.getElementById('lulusChart'), {
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023'],
                datasets: [{
                    label: 'Mahasiswa Lulus',
                    data: [60, 90, 100],
                    backgroundColor: '#10b981',
                    borderWidth: 1
                }]
            }
        });

        new Chart(document.getElementById('genderChart'), {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [250, 120],
                    backgroundColor: ['#2563eb', '#ec4899']
                }]
            }
        });

    </script>

</body>
</html>