<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sistem Inventaris</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/assets/images/icon.png') }}" type="image/x-icon">
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
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Lupa Password?</h1>
                    <p class="text-gray-500 text-sm">Masukkan email Anda untuk menerima link reset password</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5" id="forgotForm">
                    @csrf

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

                    <button type="submit"
                        class="w-full mt-6 py-3 px-4 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-200 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                        id="submitBtn">
                        Kirim Link Reset Password
                    </button>
                </form>

                <div class="mt-8 text-center space-y-4">
                    <p class="text-gray-600 text-sm">
                        Ingat password Anda?
                        <a href="/admin/login" class="font-semibold text-cyan-600 hover:text-cyan-700 transition">
                            Login di sini
                        </a>
                    </p>
                    {{-- <p class="text-gray-600 text-sm">
                        Belum memiliki akun?
                        <a href="/admin/register"
                            class="font-semibold text-cyan-600 hover:text-cyan-700 transition">
                            Daftar di sini
                        </a>
                    </p> --}}
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
            const form = document.getElementById('forgotForm');
            const submitBtn = document.getElementById('submitBtn');

            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('status')),
                    confirmButtonColor: '#06b6d4',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
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
                    title: 'Ada Kesalahan!',
                    html: errorHtml,
                    confirmButtonColor: '#06b6d4'
                });
            @endif

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.getElementById('email').value;

                if (!email) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Email Diperlukan!',
                        text: 'Silakan masukkan email Anda terlebih dahulu',
                        confirmButtonColor: '#06b6d4'
                    });
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="inline-flex items-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Mengirim...</span>';

                setTimeout(() => {
                    form.submit();
                }, 500);
            });
        });
    </script>
</body>

</html>
