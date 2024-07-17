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
<body class="bg-custom-gradient shadow text-black ">
<x-user-navbar></x-user-navbar>   

<div class="text-center p-4  shadow-lg rounded-lg flex  ">
        <div class="size-3/4 flex">
          <div class="">
          <img src="https://images.unsplash.com/photo-1554679665-f5537f187268?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFibGUlMjBhbmQlMjBjaGFpciUyMHJlc3RvcmFufGVufDB8fDB8fHww" alt="" srcset="">
          </div>
        <h1 class="text-xl font-bold mb-4">Cek Meja dan Kursi Disini!</h1>
        <p class="mb-4">Jika Merah Pertanda sudah terisi, jika Hijau pertanda kosong</p>
        </div>
        
        <div class="grid grid-cols-2 gap-4 size-1/4">
            <div id="circle-1" class="btn btn-circle text-black"><p>1</p></div>
            <div id="circle-2" class="btn btn-circle text-black">2</div>
            <div id="circle-3" class="btn btn-circle text-black">3</div>
            <div id="circle-4" class="btn btn-circle text-black">4</div>
            <div id="circle-5" class="btn btn-circle text-black">5</div>
            <div id="circle-6" class="btn btn-circle text-black">6</div>
        </div>
    </div>

    <script>
        // Placeholder for fetching data from the database
        // Example data, replace with actual database call
        const data = [
            { id: 1, occupied: false },
            { id: 2, occupied: true },
            { id: 3, occupied: true },
            { id: 4, occupied: true },
            { id: 5, occupied: true },
            { id: 6, occupied: true }
        ];

        // Function to update the circles based on the data
        function updateCircles() {
            data.forEach(item => {
                const circle = document.getElementById(`circle-${item.id}`);
                if (item.occupied) {
                    circle.classList.add('bg-red-500');
                    circle.classList.remove('bg-green-500');
                } else {
                    circle.classList.add('bg-green-500');
                    circle.classList.remove('bg-red-500');
                }
            });
        }

        // Call the update function on page load
        updateCircles();
    </script>
    

    
   

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>