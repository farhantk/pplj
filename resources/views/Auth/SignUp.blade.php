@extends('layout.main')
<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-3xl font-bold text-prior">
                <img class="w-14 h-14 mr-2" src="{{URL::asset('/images/logo.png')}}" alt="logo">
                SIPKESA    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-prior md:text-2xl dark:text-white">
                        Daftar
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/signup" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-prior dark:text-white">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-prior text-prior text-sm rounded-lg focus:ring-prior focus:border-prior block w-full p-2.5" placeholder='nama lengkap' required value='{{old('name')}}'>
                            @error('name')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-prior dark:text-white">Alamat email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-prior text-prior text-sm rounded-lg focus:ring-prior focus:border-prior block w-full p-2.5" placeholder='name@company.com' required value='{{old('email')}}'>
                            @error('email')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-prior dark:text-white">Kata sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-prior text-prior text-sm rounded-lg focus:ring-prior focus:border-prior block w-full p-2.5" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-prior hover:bg-second focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat akun</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="/signin" class="font-medium text-prior hover:underline">Masuk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
