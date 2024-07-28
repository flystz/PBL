<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Meja</title>
</head>
<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
  <x-user-navbar></x-user-navbar>   
  <div class=" mx-auto mt-10">

 
  <div class="text-center p-4  rounded-lg flex flex-col items-center">
    <h1 class="text-xl font-bold mb-4">Cek Meja dan Kursi Disini!</h1>
    <p class="mb-4">Jika Merah Pertanda sudah terisi, jika Hijau pertanda kosong</p>
  </div>
  <div class="grid grid-cols-3 gap-x-14 gap-y-7 mx-auto lg:grid-cols-3 xl:grid-cols-3 lg:gap-x-32 xl:gap-x-32 lg:gap-y-20  ">
    <div id="circle-1" class="btn btn-circle text-black p-4 hover:bg-transparent  ">1</div>
    <div id="circle-2" class="btn btn-circle text-black p-4 hover:bg-transparent bg-green-500">2</div>
    <div id="circle-3" class="btn btn-circle text-black p-4 hover:bg-transparent bg-green-500">3</div>
    <div id="circle-4" class="btn btn-circle text-black p-4 hover:bg-transparent bg-green-500">4</div>
    <div id="circle-5" class="btn btn-circle text-black p-4 hover:bg-transparent bg-green-500">5</div>
    <div id="circle-6" class="btn btn-circle text-black p-4 hover:bg-transparent bg-green-500">6</div>
  </div>
  </div>
  <div class="flex-grow"></div>

  <footer class="bg-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
      <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>

  <script>
    async function fetchData() {
        const response = await fetch('/get-data');
        const data = await response.json();
        return data;
    }
    

    async function updateCircles() {
        const data = await fetchData();
        if (data) {
            const circle = document.getElementById(`circle-1`); // Assume the latest data is for circle 1 for example
            const circle2 = document.getElementById('circle-2');
            if (circle) {
                if (data.indikator == 1) {
                    circle.classList.add('bg-red-500');
                    circle.classList.remove('bg-green-500');
                } else {
                    circle.classList.add('bg-green-500');
                    circle.classList.remove('bg-red-500');
                }
            }
            if (circle2) {
                if (data.indikator_2 == 1) {
                    circle2.classList.add('bg-red-500');
                    circle2.classList.remove('bg-green-500');
                } else {
                    circle2.classList.add('bg-green-500');
                    circle2.classList.remove('bg-red-500');
                }
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateCircles();
        setInterval(updateCircles, 100); // Update every second
    });
  </script>

  @vite('resources/js/app.js')
</body>
</html>
