<!doctype html>
<html  class=" h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Menu </title>

</head>
<body class="bg-custom-gradient shadow  text-black  ">
<x-navbar></x-navbar>

<div class="container mx-auto p-4 h-screen">
<a href="{{ route('menu.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Menu</a>

        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead class="bg-gradient-to-r from-teal-300 to-green-300">
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Makanan</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Harga</th>
                    <th class="py-2 px-4 border-b">Gambar</th>
                    <th class="py-2 px-4 border-b">Aksi</th>

                </tr>
            </thead>
            <tbody>
            @php $counter = 1; @endphp
            @foreach ($menu as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $counter }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->makanan }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->harga }}</td>
                    <td class="py-2 px-4 border-b"><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->makanan }}" class="w-20 h-20 object-cover"></td>
                    
                    <td class="py-2 px-4 border-b">
                    <a href="{{ route('menu.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                    </form>
                </td>
                </tr>

            @php $counter++; @endphp
            @endforeach
               
            </tbody>
        </table>
        
    </div>


   

    
   

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>