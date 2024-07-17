<!doctype html>
<html  class=" h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Meja</title>

</head>
<body class="bg-custom-gradient shadow ">
<x-user-navbar></x-user-navbar>   


    <h2 class="text-xl font-bold mt-6">Cek Meja dan Kursi Disini!</h2>
    <p class="mt-2 text-gray-600">Jika Merah Pertanda sudah terisi, jika Hijau pertanda kosong</p>
    <div class="flex gap-4 mt-8">   
      <div class="w-12 h-12 rounded-full bg-gray-200 border-2 border-red-500"></div>
      <div class="w-12 h-12 rounded-full bg-gray-200 border-2 border-green-500"></div>
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