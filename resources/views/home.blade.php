<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title> Home </title>
</head>

<body class="bg-gray-200 shadow flex flex-col min-h-screen">

  <header class="flex justify-between items-center p-4 bg-gray-700 text-white">
    <h1 class="text-2xl font-bold ">EatsIQ</h1>
    <div>
      <a href="/login" class=" font-medium mr-4">Masuk</a>
      <a href="/registration" class=" font-medium mr-4">Daftar</a>
    </div>
  </header>

  <main class="w-full flex flex-grow  items-center my-20 space-y-10 px-4 lg:space-x-20 max-lg:flex-col ">
    <div class="max-w-3xl space-y-6 text-center">
      <h2 class="text-4xl lg:text-6xl font-bold text-black">Segarkan Hari Kamu Dengan Makanan dan Minuman Terbaik</h2>
      <p class="text-gray-600">Tempat terbaik untuk menikmati makanan lezat dan sehat di lingkungan yang ramah. Dari sarapan hingga makan siang, kami siap menyajikan hidangan favorit Anda dengan harga terjangkau. Datang dan rasakan kenyamanan serta kelezatan di sini!</p>
    </div>
    <img src="https://images.unsplash.com/photo-1632762346768-80b093fc5f38?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Restaurant" class="rounded-lg shadow-lg w-full lg:max-w-3xl">
  </main>

  <footer class="bg-gray-800 mt-10 lg:mt-20">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
      <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>
