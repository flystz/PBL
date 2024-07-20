<!doctype html>
<html  class=" h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Tambah Menu </title>

</head>
<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
<x-navbar></x-navbar>


<div class="container mx-auto p-10 m-20 bg-white rounded-xl">
    <h2 class="text-2xl font-bold mb-4">Tambah Menu Baru</h2>
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="makanan" class="block text-gray-700">Nama Makanan:</label>
            <input type="text" id="makanan" name="makanan" placeholder="Input Nama Makanan" class="input bg-white input-bordered w-full " />
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="textarea textarea-bordered w-full bg-white" placeholder="Input Deskripsi"></textarea>
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700">Harga:</label>
            <input type="text" id="harga" name="harga" placeholder="Input Harga Makanan" class="input bg-white input-bordered w-full " />
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700">Gambar:</label>
            <input type="file" id="gambar" name="gambar" class="file-input w-full  bg-white input-bordered " />
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-gray-700 hover:bg-white hover:text-black  hover:border-black hover:border text-white font-bold py-2 px-4 rounded">Tambah</button>
        </div>
    </form>
</div>
<span class="flex-grow"></span>
  <!-- Footer -->
  <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>