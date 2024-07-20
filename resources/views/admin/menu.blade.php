<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Menu </title>
</head>

<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
    <x-navbar></x-navbar>

    <div class="container mx-auto p-7 rounded-xl bg-white lg:mt-16   ">
        <a href="{{ route('menu.create') }}" class="bg-primary hover:bg-blue-400 btn text-white mb-10 border-0">Tambah Menu</a>

        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead class="bg-primary text-white max-lg:hidden">
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Makanan</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Harga</th>
                    <th class="py-2 px-4 border-b">Gambar</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <thead class="bg-primary text-white lg:hidden">
                <tr>
                    <th class="py-2 px-4 border-b">Makanan</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = ($menu->currentPage() - 1) * $menu->perPage() + 1; @endphp
                @foreach ($menu as $item)
                <tr class="max-lg:hidden">
                    <td class="py-2 px-4 border-b">{{ $counter }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->makanan }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
                    <td class="py-2 px-4 border-b">Rp. {{ $item->harga }}</td>
                    <td class="py-2 px-4 border-b"><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->makanan }}" class="w-20 h-20 object-cover"></td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('menu.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 border-0 text-white btn btn-sm btn-active mx-2">Edit</a>
                        <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-primary border-0 btn btn-active btn-sm text-white font-bold">Hapus</button>
                        </form>
                    </td>
                </tr>

                <tr class="lg:hidden">
                    <td class="py-2 px-4">
                        <div class="flex items-center space-x-2">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->makanan }}" class="w-20 h-20 object-cover">
                            <div class="justify-start text-start">
                                <p class="font-bold">{{ $item->makanan }}</p>
                                <p>{{ $item->deskripsi }}</p>
                                <p>Rp. {{ $item->harga }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-4 flex flex-col space-y-2">
                        <a href="{{ route('menu.edit', $item->id) }}" class="bg-blue-500 border-0 hover:bg-blue-700 text-white btn btn-sm btn-active">Edit</a>
                        <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-primary border-0 btn btn-active btn-sm text-white font-bold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @php $counter++; @endphp
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $menu->links('vendor.pagination.tailwind-daisy') }}
        </div>
    </div>
    <div class="flex-grow"></div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>