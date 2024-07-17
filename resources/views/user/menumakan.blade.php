<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Dashboard</title>
</head>
<body class="bg-custom-gradient shadow text-black">
<x-user-navbar></x-user-navbar>

<div class="flex justify-around items-center  p-4">
  <p class="text-black text-3xl font-bold text-center">Menu <br> Makanan Dan Minuman</p>
  <a href="/rekomendasi">
    <button class="btn btn-primary">Rekomendasi</button>
  </a>
</div>

<div class="grid grid-cols-4 gap-y-10 justify-items-center">
  @foreach ($menu as $item)
  <div class="card bg-cyan-950 w-80 shadow-xl">
    <figure>
      <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->makanan }}" class="w-screen h-48 object-cover">
    </figure>
    <div class="card-body">
      <h2 class="card-title text-white">{{ $item->makanan }}</h2>
      <p class="text-gray-200">{{ $item->deskripsi }}</p>
      <div class="card-actions justify-end">
        <button class="btn btn-primary">{{ $item->harga }}</button>
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- Footer -->
<footer class="bg-gray-800 mt-20">
  <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
    <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
  </div>
</footer>

@vite('resources/js/app.js')

</body>
</html>
