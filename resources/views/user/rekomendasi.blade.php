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
<body class="bg-custom-gradient shadow text-black h-svh">
<x-user-navbar></x-user-navbar>

<div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto mt-44">
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
        body: JSON.stringify({ input_item: menuInput }), // Mengirim atribut yang sesuai dengan API
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
