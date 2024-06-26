<!DOCTYPE html>
<html lang="en">

<head>
    <title>Terimakasih Telah Berpartisipasi</title>
    @include('layout-pemilih.head')
</head>

<body>

    <!-- Navbar -->
    @include('layout-pemilih.header')
    <!-- End Navbar -->

    <!-- Hasil Section -->
    <div class="grid grid-cols-1 h-screen bg-gray-100">
        <div class="my-auto">
            <div class="px-10 lg:px-20 xl:px-20 2xl:px-32">
                <div class='w-full'>
                    <div class='space-y-4 bg-white p-3 rounded-xl'>
                        <div class=''>
                            <h1
                                class="text-2xl lg:text-5xl xl:text-6xl 2xl:text-7xl text-center text-black font-semibold">
                                Terimakasih Atas Partisipasinya
                            </h1>
                        </div>
                        <!-- chart -->
                        <div class="p-6">
                            <div>
                                <h1 class="font-light">Jumlah Suara</h1>
                                <i class="fa fa-arrow-up text-lime-500"></i>
                            </div>
                            <canvas id="grafikSuara" width="100" height="20"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->

    <!-- Footer -->
    @include('layout-pemilih.footer')
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($labels) !!};
        const datasets = {!! json_encode($datasets) !!};

        const data = {
            labels: labels,
            datasets: datasets
        };

        // Chart.js configuration
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        };

        // Create the chart
        const myChart = new Chart(
            document.getElementById('grafikSuara'),
            config
        );
    </script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

</body>

</html>
