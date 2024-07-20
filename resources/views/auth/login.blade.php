<!-- <!doctype html>
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
            <a href="registration" class="text-black font-medium mr-4">Daftar</a>
            
        </div>
    </header>
<div class=" pt-40 flex items-center justify-center">

<div>
    <h2 class="text-2xl font-bold mb-4 text-center">Masuk</h2>
    <p class="text-center text-gray-600">Silahkan masuk untuk melanjutkan</p>
    <form method="POST" action="{{ route('login.post') }} " class="pt-3">
              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 form-label" for="email">
                {{ __('Email Address') }}
                </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" placeholder="name@example.com" required>
                @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
             
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2 form-label" for="password">
                {{ __('Password') }}
                </label>
                <input class="form-control @error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************" required>
            </div>
                @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">{{ __('Login') }}</button>

                  
                </form>  
    
    </div>
</div>
</body>
</html> -->

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title> Login </title>
</head>
<body class="bg-gray-200 shadow  text-black flex flex-col min-h-screen">

<header class="bg-gray-700 flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold text-white  ">EatsIQ</h1>
    <div>
        <a href="/login" class="text-white   font-medium mr-4">Masuk</a>
        <a href="/registration" class="text-white  font-medium mr-4">Daftar</a>
    </div>
</header>

<div class="bg-gray-200  h-full flex items-center justify-center my-auto">
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Masuk</h2>
            <p class="text-center text-gray-900 text-xl">Silahkan masuk untuk melanjutkan</p>
            <form method="POST" action="{{ route('login.post') }}" class="pt-3">
              @csrf

              @session('error')
                  <div class="alert alert-danger mb-4 p-4 rounded bg-red-100 text-red-700" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <div class="space-y-4">
                <div>
                  <label class="block text-gray-900 text-sm font-bold mb-2" for="email">
                    {{ __('Email Address') }}
                  </label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline bg-white" name="email" id="email" placeholder="name@example.com" required>
                  @error('email')
                        <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div>
                  <label class="block text-gray-900 text-sm font-bold mb-2" for="password">
                    {{ __('Password') }}
                  </label>
                  <input class="form-control @error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline bg-white" name="password" id="password" type="password" placeholder="******************" required>
                  @error('password')
                        <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn bg-gray-700 hover:bg-white hover:text-black text-white  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">{{ __('Login') }}</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

