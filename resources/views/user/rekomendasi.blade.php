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

<body class="bg-gray-200 shadow text-black min-h-screen bg-repeat-space ">
  <x-user-navbar></x-user-navbar>

  <div class="bg-white lg:flex max-md:grid max-lg:space-y-20 lg:space-x-20 lg:m-10 max-lg:m-5 rounded-lg max-lg:p-5 lg:p-20">
    <div class="overflow-x-auto lg:size-2/4 max-lg:size-">
      <table class="table">
        <thead class="bg-primary text-white">
          <tr>
            <th class=" border">No</th>
            <th class="border">Menu</th>
          </tr>
        </thead>
        <tbody>
          <!-- Use a loop to generate table rows -->
          @php
          $menuItems = [
          'es genderuwo','lemon tea','lumpia udang','mie angel','mie gacoan lv 0','mie gacoan lv 1',
          'mie gacoan lv 2','mie gacoan lv 3','mie gacoan lv 4','mie iblis lv 0','mie iblis lv 1','mie iblis lv 2',
          'mie iblis lv 3','mie iblis lv 4','mie iblis lv 6','mie iblis lv 8', 'mie setan lv 1','mie suit',
          'pangsit','siomay','siomay ayam','teh','thai green tea','udang keju','udang rambutan'  
          ];

          $perPage = 10;
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          $totalItems = count($menuItems);
          $totalPages = ceil($totalItems / $perPage);
          $startIndex = ($page - 1) * $perPage;
          $currentItems = array_slice($menuItems, $startIndex, $perPage);
          @endphp

          <!-- Use a loop to generate table rows -->
          @foreach ($currentItems as $index => $menu)
          <tr class="hover bg-white">
            <td class="px-4 py-2 border text-center">{{ $startIndex + $index + 1 }}</td>
            <td class="px-4 py-2 border">{{ $menu }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Pagination Controls -->
      <div class="flex justify-center mt-4">
        @if ($page > 1)
        <a href="?page={{ $page - 1 }}" class="btn bg-transparent border-2 border-primary text-gray-950 mr-2">Previous</a>
        @endif
        @if ($page < $totalPages) <a href="?page={{ $page + 1 }}" class="btn text-white btn-primary">Next</a>
          @endif
      </div>
    </div>

    <div class="bg-white lg:border-2 lg:border-gray-300 p-10 rounded-lg size h-1/2">
      <h1 class="text-center text-xl font-bold mb-4">Ketikan menu Anda disini, untuk melihat rekomendasi menu lainnya</h1>

      <form id="menuForm">
        @csrf
        <div class="mb-4">
          <label for="menu" class="block text-gray-700 font-bold mb-2">Menu</label>
          <input type="text" id="menu" name="menu" class="input input-bordered w-full text-black bg-white" placeholder="Masukkan nama menu" required>
        </div>

        <div class="flex justify-center mb-4">
          <button type="submit" id="submitButton" class="btn btn-primary text-white">Kirim</button>
          <span id="loading-spinner" class="loading loading-dots loading-lg ml-2" style="display: none;"></span>
        </div>

        <div class="mb-4">
          <label for="hasil" class="block text-gray-700 font-bold mb-2">Hasil Rekomendasi</label>
          <input type="text" id="hasil" name="hasil" class="input input-bordered w-full text-black bg-white" placeholder="Rekomendasi menu" readonly>
        </div>
      </form>

      <p class="text-center text-sm text-gray-600 mt-4 pb-1">Menu dari hasil rekomendasi merupakan menu yang cocok dimakan bersamaan dengan menu yang dipilih berdasarkan pengalaman pelanggan</p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 mt-64">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
      <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>

  @vite('resources/js/app.js')

  <script>
    document.getElementById('menuForm').addEventListener('submit', async function(event) {
      event.preventDefault();

      const menuInput = document.getElementById('menu').value;
      const hasilInput = document.getElementById('hasil');
      const submitButton = document.getElementById('submitButton');
      const loadingSpinner = document.getElementById('loading-spinner');

      // Hide submit button and show loading spinner
      submitButton.style.display = 'none';
      loadingSpinner.style.display = 'inline-block';

      try {
        const response = await fetch('https://aprioripk.up.railway.app/apriori', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            input_item: menuInput
          }), // Mengirim atribut yang sesuai dengan API
        });

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const data = await response.json();
        hasilInput.value = data.consequents.join(', '); // Assuming 'consequents' is an array
      } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
      } finally {
        // Show submit button and hide loading spinner after fetching data
        submitButton.style.display = 'inline-block';
        loadingSpinner.style.display = 'none';
      }
    });
  </script>
</body>
</html>
