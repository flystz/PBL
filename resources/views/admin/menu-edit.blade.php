<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Edit Menu </title>
</head>

<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
    <x-navbar></x-navbar>

    <div class="container mx-auto p-10 lg:m-20 bg-white rounded-xl  flex-grow">
    <h2 class="text-2xl font-bold mb-4">Edit Menu</h2>
    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="makanan" class="block text-gray-700">Nama Makanan:</label>
        <input type="text" id="makanan" name="makanan" value="{{ $menu->makanan }}" class="input bg-white input-bordered w-full" />
      </div>
      <div class="mb-4">
        <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" class="textarea textarea-bordered bg-white w-full">{{ $menu->deskripsi }}</textarea>
      </div>
      <div class="mb-4">
        <label for="harga" class="block text-gray-700">Harga:</label>
        <input type="text" id="harga" name="harga" value="{{ $menu->harga }}" class="input bg-white input-bordered w-full" />
      </div>
      <div class="mb-4">
        <label for="gambar" class="block text-gray-700">Gambar:</label>
        <input type="file" id="gambar" name="gambar" class="file-input w-full bg-white input-bordered  " />
        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->makanan }}" class="w-32 h-32 object-cover mt-2">
      </div>
      <div class="mb-4">
        <button type="submit" class="bg-gray-700 hover:bg-white hover:text-black  hover:border-black hover:border text-white font-bold py-2 px-4 rounded">Update</button>
      </div>
    </form>
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