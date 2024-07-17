<!doctype html>
<html  class=" h-full bg-gray-100">
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

    <div class="flex">
        <div class="flex-initial w-5/12 md:">

        <div class="h-screen pt-20 ">
                <h1 class="font-bold text-4xl mb-4 text-center">Selamat Datang</h1>
                <h2 class="font-bold text-2xl mb-10 text-center">Buatlah Harimu Menyenangkan Dengan Makanan dan Minuman Terbaik</h2>
                <p class="text-sm text-center">Tempat terbaik untuk menikmati makanan lezat dan sehat di lingkungan yang ramah.Dari sarapan hingga makan siang, kami siap menyajikan hidangan favorit Anda dengan harga terjangkau. Datang dan rasakan kenyamanan serta kelezatan di sini</p>
                
            </div>
        </div>
        
        <div class="flex-initial w-7/12 pt-20 px-10 dan py-20 ">
            <img src="https://cdn-2.tstatic.net/travel/foto/bank/images/mie-gacoan.jpg" alt="Restaurant" 
            class=" rounded-lg h-auto w-5/6 object-cover">
        </div>
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