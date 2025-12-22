<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Inventaris</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/assets/images/icon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex bg-gray-50">
        <div class="w-full md:w-1/2 flex items-center justify-center px-6 py-6 sm:px-8 lg:px-10 bg-white">
            <div class="w-full max-w-2xl">
                <div class="mb-4">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-lg shadow-md"></div>
                        <span class="text-lg font-bold text-gray-900">Inventaris</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Daftar</h1>
                    <p class="text-gray-500 text-xs">Buat akun untuk mengakses sistem inventaris</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-3" id="registerForm">
                    @csrf

                    <!-- Data Pribadi Section -->
                    <div class="pb-3 border-b border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Data Pribadi</h3>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-1.5">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Contoh: John Doe"
                            class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                            required />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-1.5">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                            required />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-900 mb-1.5">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                placeholder="08xxxxxxxxxx"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('phone') border-red-500 @enderror"
                                required />
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="class" class="block text-sm font-medium text-gray-900 mb-1.5">
                                Kelas <span class="text-red-500">*</span>
                            </label>
                            <input id="class" type="text" name="class" value="{{ old('class') }}"
                                placeholder="Contoh: XII"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('class') border-red-500 @enderror"
                                required />
                            @error('class')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="major" class="block text-sm font-medium text-gray-900 mb-1.5">
                            Jurusan <span class="text-red-500">*</span>
                        </label>
                        <input id="major" type="text" name="major" value="{{ old('major') }}"
                            placeholder="Contoh: Rekayasa Perangkat Lunak"
                            class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('major') border-red-500 @enderror"
                            required />
                        @error('major')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-900 mb-1.5">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea id="address" name="address" rows="2"
                            placeholder="Alamat lengkap Anda"
                            class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition resize-none @error('address') border-red-500 @enderror"
                            required>{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Keamanan Section -->
                    <div class="pb-3 border-b border-gray-200 pt-2">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Keamanan</h3>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-900 mb-1.5">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <input id="password" type="password" name="password" placeholder="Min. 8 karakter"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('password') border-red-500 @enderror"
                                required />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-1.5">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Ulangi password"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                                required />
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full mt-6 py-3 px-4 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-200 shadow-md hover:shadow-lg">
                        Daftar Sekarang
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
                style="background-image:url('{{ Vite::asset('resources/assets/images/home.png') }}');">
            </div>
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