<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Calon</title>
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
        <div class="p-6">
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Add Calon</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('createcalon') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nomor:</label>
                            <input type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="no" name="no" placeholder="Nomor" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="nama" name="nama" placeholder="Nama" required>
                        </div>
                    </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Foto Paslon:</label>
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="img" name="img" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Visi:</label>
                            <textarea rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="visi"
                                name="visi" placeholder="Visi" required>
                            </textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Misi:</label>
                            <textarea rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="misi"
                                name="misi" placeholder="Misi" required>
                            </textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-500  text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
@include('layout.script')

</html>
