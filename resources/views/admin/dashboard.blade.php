<!doctype html>
<html  class=" h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Dashboard </title>

</head>
<body class="bg-custom-gradient shadow h-full text-black ">
<x-navbar></x-navbar>


   

    <div class="flex ">
        <div class="flex-initial w-5/12 md:">

            <div class=" pt-60 ">
                <h1 class="font-bold text-4xl text-center">Selamat Datang,<br> Admin</h1>
            </div>
        </div>
        <div class="flex-initial w-7/12 pt-20 ">
            <img src="https://www.kooliner.com/blog/wp-content/uploads/2022/02/Mg.jpg" alt="Mie Gacoan" 
            class=" rounded-lg h-auto w-5/6 object-cover">
        </div>
    </div>
   

    <!-- Footer -->
    <footer class="bg-gray-800 mt-52">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>