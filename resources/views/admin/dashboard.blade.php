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

<body class="bg-gray-200 shadow  text-black  flex flex-col min-h-screen">
    <x-navbar></x-navbar>

    <div class="flex flex-grow max-lg:flex-col   md:flex-row my-auto mx-auto">
        <div class="flex-initial w-full md:w-5/12">
            <div class="pt-20 md:pt-60 text-center ">
                <h1 class="font-bold text-2xl md:text-4xl">Selamat Datang,<br> Admin</h1>
            </div>
        </div>
        <div class="flex-initial w-full md:w-7/12 pt-10 md:pt-20 flex justify-center md:justify-center">
            <img src="https://www.kooliner.com/blog/wp-content/uploads/2022/02/Mg.jpg" alt="Mie Gacoan" class="rounded-lg  w-5/6 lg:w-3/4 lg:h-3/5 md:w-3/4  md:object-cover">
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-20  md:mt-52">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>