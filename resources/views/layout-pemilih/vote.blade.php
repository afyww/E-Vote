<section class="" id="vote">
    <div class="grid grid-cols-1 h-screen bg-gray-100">
        <div class="">
            <div class="px-10 lg:px-20 xl:px-20 2xl:px-32">
                <div class='w-full'>
                    <div class='space-y-4 bg-white p-3 rounded-xl'>
                        <div class=''>
                            <h1
                                class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl text-center text-black font-semibold">
                                Vote
                            </h1>
                        </div>
                        <div class="grid grid-cols-1 xl:grid-cols-3 p-4">
                            @foreach ($calon as $item)
                                <div class="p-4 rounded-xl space-y-4">
                                    <h1 class="text-black text-center text-3xl">{{ $item->no }}</h1>
                                    <img class="h-fit mx-auto w-fit"
                                        src="{{ asset('storage/img/' . basename($item->img)) }}">
                                    <h1 class="text-black font-extrabold text-3xl text-center">{{ $item->nama }}</h1>
                                    <h1 class="text-black text-center font-light text-xl">{{ $item->visi }}</h1>
                                    <h1 class="text-black text-center font-light text-xl">{{ $item->misi }}</h1>
                                    <div class="mx-auto text-center">
                                        <form action="{{ route('vote') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="calon_id" value="{{ $item->id }}">
                                            <button type="submit"
                                                class="bg-blue-500 p-2 px-5 text-lg font-semibold rounded-xl text-white">Vote</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
