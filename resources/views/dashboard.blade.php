<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    @include('layout.head')
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6 space-y-2">
            <div class='w-full h-fit mx-auto'>
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3 gap-4 p-2">
                    <!-- card1 -->
                    <a href="{{ route('calon') }}">
                        <div class="bg-red-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_calon }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Calon</h1>
                        </div>
                    </a>
                    <!-- card2 -->
                    <a href="{{ route('pemilih') }}">
                        <div class="bg-green-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_pemilih }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Pemilih</h1>
                        </div>
                    </a>
                    <!-- card3 -->
                    <a href="">
                        <div class="bg-yellow-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_suara }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Suara</h1>
                        </div>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <!-- chart -->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Suara</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikSuara" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($labels) !!};
        const datasets = {!! json_encode($datasets) !!}; // Changed $data to $datasets

        const data = {
            labels: labels,
            datasets: datasets // Changed to datasets
        };

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
            },
        };

        const myChart = new Chart(
            document.getElementById('grafikSuara'),
            config
        );
    </script>
</body>
@include('layout.script')

</html>
