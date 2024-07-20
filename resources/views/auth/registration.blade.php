<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 shadow  text-black flex flex-col min-h-screen">

<header class="bg-gray-700 flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold text-white  ">EatsIQ</h1>
    <div>
        <a href="/login" class="text-white   font-medium mr-4">Masuk</a>
        <a href="/registration" class="text-white  font-medium mr-4">Daftar</a>
    </div>
</header>

<!-- <div class="bg-custom-gradient shadow  h-full flex items-center justify-center">
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Daftar</h2>
            <form method="POST" action="{{ route('register.post') }}">
              @csrf

              @session('error')
                  <div class="alert alert-danger mb-4 p-4 rounded bg-red-100 text-red-700" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <div class="space-y-4">
                <div>
                  <div class="form-floating mb-3 relative">
                    <input type="text" class="form-control @error('name') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="name" id="name" placeholder="name@example.com" required>
                    <label for="name" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Name') }}</label>
                  </div>
                  @error('name')
                        <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div>
                  <div class="form-floating mb-3 relative">
                    <input type="email" class="form-control @error('email') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Email Address') }}</label>
                  </div>
                  @error('email')
                        <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div>
                  <div class="form-floating mb-3 relative">
                    <input type="password" class="form-control @error('password') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" id="password" placeholder="Password" required>
                    <label for="password" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Password') }}</label>
                  </div>
                  @error('password')
                      <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div>
                  <div class="form-floating mb-3 relative">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" required>
                    <label for="password_confirmation" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Confirm Password') }}</label>
                  </div>
                  @error('password_confirmation')
                      <span class="text-red-500 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">{{ __('Register') }}</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div> -->
<div class=" shadow h-full flex items-center justify-center">
    <div class="container mx-auto px-4 py-16">
      <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Daftar</h2>
        <form method="POST" action="{{ route('register.post') }}">
          @csrf

          @if(session('error'))
            <div class="alert alert-danger mb-4 p-4 rounded bg-red-100 text-red-700" role="alert">
              {{ session('error') }}
            </div>
          @endif

          <div class="space-y-4">
            <div>
              <div class="form-floating mb-3 relative">
                <input type="text" class="form-control bg-white text-black @error('name') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="name" id="name" placeholder="name" required>
                <label for="name" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Name') }}</label>
              </div>
              @error('name')
                <span class="text-red-500 text-sm" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div>
              <div class="form-floating mb-3 relative">
                <input type="email" class="form-control bg-white text-black @error('email') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" id="email" placeholder="name@example.com" required>
                <label for="email" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Email Address') }}</label>
              </div>
              @error('email')
                <span class="text-red-500 text-sm" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div>
              <div class="form-floating mb-3 relative">
                <input type="password" class="form-control bg-white text-black @error('password') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" id="password" placeholder="Password" required>
                <label for="password" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Password') }}</label>
              </div>
              @error('password')
                <span class="text-red-500 text-sm" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div>
              <div class="form-floating mb-3 relative">
                <input type="password" class="form-control bg-white text-black @error('password_confirmation') is-invalid @enderror w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" required>
                <label for="password_confirmation" class="form-label absolute text-gray-600 bg-white px-1 -top-2.5 left-3">{{ __('Confirm Password') }}</label>
              </div>
              @error('password_confirmation')
                <span class="text-red-500 text-sm" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12">
              <div class="d-grid my-3">
                <button class="btn bg-gray-700 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">{{ __('Register') }}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>



