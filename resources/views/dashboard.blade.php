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
<body class="bg-custom-gradient shadow ">
<x-navbar></x-navbar>


   

    <div class="flex">
        <div class="flex-initial w-5/12 md:">

            <div class="h-screen pt-60 ">
                <h1 class="font-bold text-4xl text-center">Selamat Datang,<br> Admin</h1>
            </div>
        </div>
        <div class="flex-initial w-7/12 pt-20 ">
            <img src="https://images.unsplash.com/photo-1632762346768-80b093fc5f38?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Restaurant" 
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