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

  <div class="w-full flex max-lg:flex-col py-5 lg:px-28 max-lg:space-y-5 max-lg:justify-center lg:justify-between items-center">
    <p></p>
    <p class="text-black text-3xl font-bold text-center">Menu <br> Makanan Dan Minuman</p>
    <a href="/rekomendasi">
      <button class="btn text-white btn-primary">Rekomendasi</button>
    </a>
  </div>

  <div class="flex-grow">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-10 gap-x-4 justify-items-center p-4">
      @foreach ($menu as $item)
      <div class="card bg-white w-full sm:w-80 shadow-xl" id="item-{{ $item->id }}">
        <figure>
          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->makanan }}" class="w-full h-48 object-cover">
        </figure>
        <div class="card-body">
          <h2 class="card-title text-gray-950">{{ $item->makanan }}</h2>
          <p> {{ $item->harga }}</p>
          <div class="card-actions justify-end">
            <button class="btn bg-blue-500 text-white border-0" onclick="showModal('{{ $item->id }}', '{{ asset('storage/' . $item->gambar) }}', '{{ $item->makanan }}', '{{ $item->deskripsi }}', '{{ $item->harga }}')">Detail</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <dialog id="my_modal_4" class="modal backdrop-blur-md">
    <div class="modal-box bg-gray-300">
      <div class="card card-side bg-gray-300 ">
        <figure>
          <img id="modal-img" src="" alt="Detail Image" class="w-40 h-48 object-cover" />
        </figure>
        <div class="card-body">
          <h2 id="modal-title" class="card-title"></h2>
          <p id="modal-description"></p>
          <p id="modal-price"></p>
        </div>
      </div>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn border-2 bg-transparent text-gray-950 border-blue-500">Close</button>
        </form>
      </div>
    </div>
  </dialog>


  <!-- Footer -->
  <footer class="bg-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
      <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>

  @vite('resources/js/app.js')

  <script>
    function showModal(id, image, title, description, price) {
      document.getElementById('modal-img').src = image;
      document.getElementById('modal-title').textContent = title;
      document.getElementById('modal-description').textContent = description;
      document.getElementById('modal-price').textContent = price;
      document.getElementById('my_modal_4').showModal();
    }
  </script>

</body></html>