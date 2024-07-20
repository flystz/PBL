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
<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
  <x-user-navbar></x-user-navbar>

  <div class="flex-grow flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-2xl">
      <h1 class="font-bold text-4xl mb-4 text-center">EatsIQ</h1>
      <h2 class="font-bold text-2xl mb-10 text-center">Berikan Ulasan kalian kepada kami seperti makanan, pelayanan dan suasana</h2>
      
      <!-- Alert Section -->
      @if (session('success'))
        <div id="success-alert" class="alert alert-success flex items-center mb-4" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="ml-2">{{ session('success') }}</span>
        </div>
        <script>
          setTimeout(function() {
            var alert = document.getElementById('success-alert');
            alert.style.display = 'none';
            document.getElementById('loading-spinner').style.display = 'none'; // Hide the loading spinner after alert
          }, 3500);
        </script>
      @endif
      @if ($errors->any())
        <div class="alert alert-error flex items-center mb-4" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          <span class="ml-2">{{ $errors->first() }}</span>
          <button type="button" class="ml-auto" aria-label="Close" onclick="this.parentElement.style.display='none'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current text-red-700" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 9l4-4-1-1-4 4-4-4-1 1 4 4-4 4 1 1 4-4 4 4 1-1-4-4z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      @endif
      
      <form method="POST" action="{{ route('submit.review') }}" onsubmit="showLoadingSpinner()">
        @csrf
        <div class="mb-4 text-center">

          <label for="review" class="block text-gray-700 text-sm font-bold mb-2">Ulasan</label>
          <span id="loading-spinner" class="backdrop-blur-lg loading loading-spinner loading-lg ml-2" style="display: none;">
          </span>
          <textarea name="review" id="review" class="textarea textarea-bordered textarea-lg w-full bg-white" placeholder="Tuliskan ulasan kamu disini" rows="10">
            
          </textarea>
            
          <input type="hidden" id="prediksi">
          <div class="my-3">
            <button class="btn bg-primary text-white border-0 hover:bg-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
              Kirim
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
      <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>

  @vite('resources/js/app.js')

  <script>
    function showLoadingSpinner() {
      document.getElementById('loading-spinner').style.display = 'inline-block';
    }
  </script>
</body>
</html>
