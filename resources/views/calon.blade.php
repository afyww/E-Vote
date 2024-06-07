<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pemilih</title>
    @include('layout.head')
    <link href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet" />
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6">
            <div class='w-full rounded-xl bg-white h-fit mx-auto'>
                <div class="p-3">
                    <div class="flex justify-between">
                        <h1 class="font-extrabold text-3xl">Calon</h1>
                        <a class="p-2 bg-blue-500 rounded-xl text-white hover:text-black text-center px-10"
                            href="{{ route('addcalon') }}">Add
                            calon</a>
                    </div>
                </div>
                <div class="p-2">
                    <div class="overflow-auto">
                        <table id="myTable" class="bg-gray-50 border-2">
                            <thead class="w-full">
                                <th>No</th>
                                <th>Date</th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Img</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($calon as $calon)
                                    <tr class="border-2">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $calon->created_at }}</td>
                                        <td>{{ $calon->no }}</td>
                                        <td>{{ $calon->nama }}</td>
                                        <td>
                                            <img class="h-fit mx-auto w-32"
                                                src="{{ asset('storage/img/' . basename($calon->img)) }}">
                                        </td>
                                        <td>{{ $calon->visi }}</td>
                                        <td>{{ $calon->misi }}</td>
                                        <td class="flex space-x-2">
                                            <a href="{{ route('editcalon', ['id' => $calon->id]) }}">
                                                <h1
                                                    class="p-2 px-10 text-white hover:text-black bg-blue-500 rounded-xl text-center">
                                                    Edit</h1>
                                            </a>
                                            <form
                                                class="p-2 px-10 text-white hover:text-black bg-red-500 rounded-xl text-center"
                                                method="post"
                                                action="{{ route('destroycalon', ['id' => $calon->id ]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable', {
                columnDefs: [{
                    targets: 1, // Index of the 'Date' column
                    render: function(data, type, row) {
                        // Assuming the date is in 'YYYY-MM-DD HH:MM:SS' format
                        var date = new Date(data);
                        return date.toLocaleDateString(); // Format the date as needed
                    },
                }, ],
            });
        });
    </script>
</body>
@include('layout.script')

</html>
