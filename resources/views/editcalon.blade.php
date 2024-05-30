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
                    <h1 class="font-extrabold text-3xl">Edit Calon</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updatecalon', ['id' => $calon->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nomor:</label>
                            <input type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="no" name="no" value="{{ $calon->no }}" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="nama" name="nama" value="{{ $calon->nama }}" required>
                        </div>
                    </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Foto Paslon:</label>
                            <img class="h-fit mx-auto w-1/4" src="{{ asset('storage/img/' . basename($calon->img)) }}">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="img" name="img" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Visi:</label>
                            <textarea rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="visi"
                                name="visi" placeholder="Visi" required> {{ $calon->visi }}
                            </textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Misi:</label>
                            <textarea rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="misi"
                                name="misi" placeholder="Misi" required>{{ $calon->misi }}
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
