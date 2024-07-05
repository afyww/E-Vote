<!DOCTYPE html>
<html lang="en">

<head>
    <title>Decrypt</title>
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
                    <div class="">
                        <h1 class="font-extrabold text-3xl">Decrypt</h1>
                    </div>
                </div>
                <div class="p-2">
                    <div class="">
                        <form class="flex overflow-auto space-x-4">
                            <input class="p-2 border-2 border-gray-400 bg-white rounded-xl" type="nik" name="nik" placeholder="NIK" required />
                            <button class="p-2 w-fit text-white hover:text-black bg-blue-500 rounded-xl" type="button">Encrypt</button>
                        </form>
                    </div>
                </div>

            </div>
    </main>
</body>
@include('layout.script')

</html>
