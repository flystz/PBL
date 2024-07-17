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

<body class="bg-custom-gradient shadow text-black min-h-screen bg-repeat-space ">
  <x-user-navbar></x-user-navbar>

  <div class="flex">



    <div class="overflow-x-auto size-1/2 mt-40 ">
      <table class="table text-black  mx-auto size-2/3 ">
        <thead class="bg-primary text-black">
          <tr>
            <th class=" border">No</th>
            <th class="border">Menu</th>
          </tr>
        </thead>
        <tbody>
          <!-- Use a loop to generate table rows -->
          @php
          $menuItems = [
          'air mineral', 'ceker', 'ceker ayam', 'coklat', 'es coklat', 'es genderuwo',
          'es gobak sodor', 'es petak umpet', 'es pocong', 'es sluku bathok', 'es sundel bolong',
          'es teklek', 'es tuyul', 'gacoan fest a', 'gacoan fest b', 'gacoan fest c', 'genderuwo',
          'ice tea', 'lemon tea', 'lumpia udang', 'mega diskon paket gacoan b', 'mie angel',
          'mie angel super', 'mie gacoan lv 0', 'mie gacoan lv 1', 'mie gacoan lv 2', 'mie gacoan lv 3',
          'mie gacoan lv 4', 'mie gacoan lv 6', 'mie gacoan lv 8', 'mie hompimpa lv 1', 'mie hompimpa lv 2',
          'mie hompimpa lv 3', 'mie hompimpa lv 4', 'mie hompimpa lv 6', 'mie hompimpa lv 8', 'mie iblis lv 0',
          'mie iblis lv 1', 'mie iblis lv 2', 'mie iblis lv 3', 'mie iblis lv 4', 'mie iblis lv 6',
          'mie iblis lv 8', 'mie setan lv 1', 'mie setan lv 2', 'mie setan lv 3', 'mie setan lv 4',
          'mie setan lv 6', 'mie setan lv 8', 'mie suit', 'milo', 'orange', 'paket gacoan a', 'paket gacoan b',
          'paket hompimpa a', 'pangsit', 'pangsit goreng', 'pocong', 'siomay', 'siomay ayam', 'sundelbolong',
          'teh', 'teh tarik', 'thai green tea', 'thai tea ori', 'tuyul', 'udang keju', 'udang rambutan',
          'vanila latte', 'vanilla latte'
          ];

          $perPage = 15;
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
        <a href="?page={{ $page - 1 }}" class="btn btn-primary mr-2">Previous</a>
        @endif
        @if ($page < $totalPages)
        <a href="?page={{ $page + 1 }}" class="btn btn-primary">Next</a>
        @endif
      </div>
    </div>


    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto mt-44 size h-1/2">
      <a href="/menumakan">
        <button class="btn btn-circle mb-5 btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </a>
      <h1 class="text-center text-xl font-bold mb-4">Ketikan menu Anda disini, untuk melihat rekomendasi menu lainnya</h1>

      <form id="menuForm">
        @csrf
        <div class="mb-4">
          <label for="menu" class="block text-gray-700 font-bold mb-2">Menu</label>
          <input type="text" id="menu" name="menu" class="input input-bordered w-full text-black bg-white" placeholder="Masukkan nama menu" required>
        </div>

        <div class="flex justify-center mb-4">
          <button type="submit" class="btn btn-primary shadow-lg">Kirim</button>
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
      }
    });
  </script>

</body>

</html>