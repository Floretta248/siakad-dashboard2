<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Mahasiswa</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body class="bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto py-10 px-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800">Dashboard Mahasiswa</h1>
                    <p class="text-gray-500 mt-2">Statistik jumlah mahasiswa per prodi, angkatan, dan kelulusan.</p>
                </div>

                <a href="{{ route('student.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                    Kembali ke Daftar Mahasiswa
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-3xl shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Jumlah Mahasiswa per Prodi</h2>
                    <canvas id="prodiChart" height="220"></canvas>
                </div>

                <div class="bg-white rounded-3xl shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Jumlah Mahasiswa per Angkatan</h2>
                    <canvas id="angkatanChart" height="220"></canvas>
                </div>

                <div class="bg-white rounded-3xl shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Jumlah Mahasiswa Lulus per Angkatan</h2>
                    <canvas id="graduatedChart" height="220"></canvas>
                </div>

                <div class="bg-white rounded-3xl shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Status Kelulusan Mahasiswa</h2>
                    <canvas id="statusChart" height="220"></canvas>
                </div>
            </div>
        </div>

        <script>
            const prodiLabels = @json($prodiCounts->keys());
            const prodiValues = @json($prodiCounts->values());
            const angkatanLabels = @json($angkatanCounts->keys());
            const angkatanValues = @json($angkatanCounts->values());
            const graduatedLabels = @json($graduatedCounts->keys());
            const graduatedValues = @json($graduatedCounts->values());
            const statusData = @json($statusData);

            new Chart(document.getElementById('prodiChart'), {
                type: 'bar',
                data: {
                    labels: prodiLabels,
                    datasets: [{
                        label: 'Jumlah Mahasiswa',
                        data: prodiValues,
                        backgroundColor: ['#2563eb', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'],
                        borderRadius: 12,
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });

            new Chart(document.getElementById('angkatanChart'), {
                type: 'line',
                data: {
                    labels: angkatanLabels,
                    datasets: [{
                        label: 'Jumlah Mahasiswa',
                        data: angkatanValues,
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.15)',
                        fill: true,
                        tension: 0.3,
                        pointRadius: 5,
                        pointBackgroundColor: '#2563eb',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });

            new Chart(document.getElementById('graduatedChart'), {
                type: 'bar',
                data: {
                    labels: graduatedLabels,
                    datasets: [{
                        label: 'Jumlah Mahasiswa Lulus',
                        data: graduatedValues,
                        backgroundColor: '#10b981',
                        borderRadius: 12,
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });

            new Chart(document.getElementById('statusChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(statusData),
                    datasets: [{
                        data: Object.values(statusData),
                        backgroundColor: ['#2563eb', '#f97316'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    </body>
</html>
