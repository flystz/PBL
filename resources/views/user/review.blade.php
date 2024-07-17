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

<div class="">
    <div class="">
        <div class="h-screen pt-20">
            <h1 class="font-bold text-4xl mb-4 text-center">EatsIQ</h1>
            <h2 class="font-bold text-2xl mb-10 text-center">Berikan Ulasan kalian kepada kami seperti makanan, pelayanan dan suasana</h2>
            
            <!-- Alert Section -->
            @if (session('success'))
                <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 rounded relative mb-4 h-24 size-1/3 mx-auto" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    
                  
                </div>
                <script>
                    setTimeout(function() {
                        var alert = document.getElementById('success-alert');
                        alert.style.display = 'none';
                    }, 5000);
                </script>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849l-4.349-4.349-4.348 4.349-1.415-1.415 4.349-4.349-4.349-4.348 1.415-1.415 4.348 4.349 4.349-4.349 1.415 1.415-4.349 4.348 4.349 4.349z"/></svg>
                    </span>
                </div>
            @endif
            
            <form method="POST" action="{{ route('submit.review') }}">
                @csrf
                <div class="mb-4 size-1/3 text-center mx-auto">
                    <label for="review" class="block text-gray-700 text-sm font-bold mb-2">     </label>
                    <textarea name="review" id="review" class="shadow appearance-none border rounded w-full py-2 px-3 text-black bg-white leading-tight focus:outline-none focus:shadow-outline" rows="10"></textarea>
                    <input type="hidden" id="prediksi">
                    <div class="d-grid my-3">
                        <button class="btn bg-primary hover:bg-gray-100 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
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
