<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css',true) }}" rel="stylesheet">
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">

    {{-- @error('email')
    <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">{{ $message }}</strong>
    </div>
    @enderror --}}
    @if ($errors->any())
        <div class="mb-8 bg-red-200 p-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-800">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mt-8 space-y-6" action="/resetPassword" method="POST">
    @csrf
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Email address</label>
          <input required id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="email">
        </div>
      </div>

      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Password</label>
          <input required id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="password">
        </div>
      </div>

      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Confirm Password</label>
          <input required id="password_confirmation" name="password_confirmation" type="Password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirm password">
        </div>
      </div>

      <input id="token" name="token" type="hidden" required value={{$token}}>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Reset
        </button>
      </div>
    </form>
  </div>
</div>
<script>
</script>
</body>