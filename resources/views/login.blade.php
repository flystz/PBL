<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-custom-gradient shadow h-screen">

    <header class="flex justify-between items-center p-4">
        <h1 class="text-2xl font-bold text-black"> <a href="/home">EatsIQ </a></h1>
        <div>
            <a href="/login" class="text-black font-medium mr-4">Masuk</a>
            <a href="/register" class="text-black font-medium mr-4">Daftar</a>
            
        </div>
    </header>
<div class="background-gradient min-h-screen flex items-center justify-center">


    <div class="w-full max-w-xs">
        <h1 class="text-center text-3xl font-bold mb-8 text-black">EatsIQ</h1>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-center text-2xl font-bold mb-6">Masuk</h2>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button"> <a href="dashboard">
                    Masuk </a>
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
