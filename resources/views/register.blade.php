<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-custom-gradient shadow h-screen">

    <header class="flex justify-between items-center p-4">
        <h1 class="text-2xl font-bold text-black">EatsIQ</h1>
        <div>
            <a href="/login" class="text-black font-medium mr-4">Masuk</a>
            <a href="/register" class="text-black font-medium mr-4">Daftar</a>
            
        </div>
    </header>

    <div class="bg-gradient-to-br from-pink-50 to-cyan-50">
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-4">Daftar</h2>
            <form class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                    <input type="text" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Insert name">
                </div>
                <div>
                    <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input type="text" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Insert username">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="@">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Insert password">
                </div>
                <div>
                    <label for="repeat-password" class="block text-gray-700 font-bold mb-2">Repeat Password</label>
                    <input type="password" id="repeat-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Insert password">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Daftar</button>
            </form>
        </div>
    </div>
    </div>



</body>
</html>
