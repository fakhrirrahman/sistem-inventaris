<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Inventaris</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex bg-gray-50">
        <div class="w-full md:w-1/2 flex items-center justify-center px-6 py-12 sm:px-8 lg:px-10 bg-white">
            <div class="w-full max-w-md">
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-lg shadow-md"></div>
                        <span class="text-xl font-bold text-gray-900">Inventaris</span>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Daftar</h1>
                    <p class="text-gray-500 text-sm">Buat akun untuk mengakses sistem inventaris</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5" id="registerForm">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Nama Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                            required />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="nama@perusahaan.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                            required />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input id="password" type="password" name="password" placeholder="Min. 8 karakter"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('password') border-red-500 @enderror"
                            required />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                            Konfirmasi Password <span class="text-red-500">*</span>
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Ulangi password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                            required />
                    </div>

                    <button type="submit"
                        class="w-full mt-6 py-3 px-4 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-200 shadow-md hover:shadow-lg">
                        Daftar
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600 text-sm">
                        Sudah memiliki akun?
                        <a href="/admin/login"
                            class="font-semibold text-cyan-600 hover:text-cyan-700 transition">
                            Login di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-cyan-500 to-cyan-600 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{vite::asset('resources/images/register-bg.jpg')}}'); filter: brightness(0.7);">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    confirmButtonColor: '#06b6d4',
                    confirmButtonText: 'Login Sekarang',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didClose: function() {
                        window.location.href = '/admin/login';
                    }
                });
            @endif

            @if ($errors->any())
                let errorMessages = [];
                @foreach ($errors->all() as $error)
                    errorMessages.push(@json($error));
                @endforeach
                
                let errorHtml = '<div style="text-align: left;">';
                errorMessages.forEach(function(msg) {
                    errorHtml += '<p style="margin: 5px 0;">• ' + msg + '</p>';
                });
                errorHtml += '</div>';
                
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal!',
                    html: errorHtml,
                    confirmButtonColor: '#06b6d4'
                });
            @endif
        });
    </script>
</body>

</html>