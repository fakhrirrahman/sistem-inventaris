<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Sistem Inventaris</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <div class="w-full md:w-1/2 flex items-center justify-center px-6 py-12 sm:px-8 lg:px-10 bg-white">
            <div class="w-full max-w-md">
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-lg shadow-md"></div>
                        <span class="text-xl font-bold text-gray-900">Inventaris</span>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Masuk</h1>
                    <p class="text-gray-500 text-sm">Login untuk mengakses sistem inventaris</p>
                </div>

                {{-- <button type="button"
                    class="w-full mb-8 py-3 px-4 border border-gray-300 rounded-lg text-gray-700 font-medium flex items-center justify-center gap-2 hover:bg-gray-50 transition duration-200">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                            fill="#FBBC05" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335" />
                    </svg>
                    <span>Lanjutkan dengan Google</span>
                </button> --}}

                {{-- <div class="flex items-center mb-8">
                    <div class="flex-1 border-t border-gray-200"></div>
                    <span class="px-3 text-gray-500 text-sm">atau</span>
                    <div class="flex-1 border-t border-gray-200"></div>
                </div> --}}

                <form id="loginForm" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email" name="email" type="email" placeholder="nama@perusahaan.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                            required autofocus autocomplete="email" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input id="password" name="password" type="password" placeholder="Masukkan password Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                            required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" value="1"
                                class="w-4 h-4 border border-gray-300 rounded bg-white text-cyan-600 focus:ring-2 focus:ring-cyan-500 cursor-pointer" />
                            <span class="text-sm text-gray-700">Ingat saya</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-cyan-600 hover:text-cyan-700 transition">
                            Lupa password?
                        </a>
                    </div>

                    <button type="submit" id="loginButton"
                        class="w-full mt-6 py-3 px-4 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-200 shadow-md hover:shadow-lg">
                        Masuk
                    </button>
                </form>


                   <div class="mt-8 text-center">
                    <p class="text-gray-600 text-sm">
                        Belum memiliki akun?
                        <a href="{{ route('filament.admin.pages.register') }}" class="font-semibold text-cyan-600 hover:text-cyan-700 transition">
                            Buat akun
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-cyan-500 to-cyan-600 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ Vite::asset('resources/assets/images/home.png') }}');"></div>
        </div>
    </div>
    
    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const button = document.getElementById('loginButton');
            const originalText = button.textContent;
            button.disabled = true;
            button.textContent = 'Memproses...';
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('{{ route("login.authenticate") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    await Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: 'Anda akan diarahkan ke dashboard',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    window.location.href = data.redirect;
                } else {
                    await Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: data.message || 'Email atau password salah',
                        confirmButtonColor: '#06b6d4',
                        confirmButtonText: 'OK'
                    });
                    button.disabled = false;
                    button.textContent = originalText;
                }
            } catch (error) {
                await Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Mohon coba lagi',
                    confirmButtonColor: '#06b6d4',
                    confirmButtonText: 'OK'
                });
                button.disabled = false;
                button.textContent = originalText;
            }
        });
    </script>
</body>

</html>
