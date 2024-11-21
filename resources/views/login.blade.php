@extends('layouts.main')

@section('container')

<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-t from-primary to-secondary">
  <div class="w-full max-w-md px-4"> 
    @if (session()->has('toast_success'))
      {{-- Toast success message --}}
    @endif

    @if (session()->has('toast_error'))
      {{-- Toast error message --}}
    @endif

    <main class="flex flex-col items-center text-center w-full bg-gradient-to-b from-tertiary to-primary  rounded-lg shadow-lg p-8 mt-32">
      <img src="img/icon/logonav.png" alt="Rifal Kurniawan" class="w-32 h-32 md:w-96 md:h-48  mb-5" />
      <h1 class="text-2xl md:text-3xl font-bold mb-6 uppercase">Login UNO</h1>
      
      <form action="/login" method="POST" class="w-full space-y-4">
        @csrf
        <div>
          <label for="email" class="sr-only">Email address</label>
          <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:border-primary @error('email') border-red-500 @enderror" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          @error('email')
            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
          @enderror
        </div>

        <div>
          <label for="Password" class="sr-only">Password</label>
          <input type="password" name="password" id="Password" class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:border-primary" placeholder="Password" required>
        </div>

        <button type="submit" class="w-full py-2 bg-red-700 text-white rounded-md hover:bg-red-800 transition-colors">Login</button>
      </form>
    </main>   
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
    <path fill="#921f1b" fill-opacity="1" d="M0,224L21.8,224C43.6,224,87,224,131,202.7C174.5,181,218,139,262,138.7C305.5,139,349,181,393,197.3C436.4,213,480,203,524,192C567.3,181,611,171,655,138.7C698.2,107,742,53,785,69.3C829.1,85,873,171,916,213.3C960,256,1004,256,1047,218.7C1090.9,181,1135,107,1178,106.7C1221.8,107,1265,181,1309,181.3C1352.7,181,1396,107,1418,69.3L1440,32L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
  </svg>
</div>


@endsection
