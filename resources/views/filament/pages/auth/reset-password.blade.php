<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Sistem Inventaris</title>
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
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h1>
                    <p class="text-gray-500 text-sm">Buat password baru yang kuat untuk akun Anda</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-5" id="resetForm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                            placeholder="nama@perusahaan.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                            required readonly />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                            Password Baru <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" placeholder="Min. 8 karakter"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition @error('password') border-red-500 @enderror"
                                required />
                            <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" id="togglePassword">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center text-xs">
                                <span class="w-2 h-2 rounded-full mr-2" id="lengthCheck"></span>
                                <span id="lengthText" class="text-gray-500">Minimal 8 karakter</span>
                            </div>
                            <div class="flex items-center text-xs">
                                <span class="w-2 h-2 rounded-full mr-2" id="uppercaseCheck"></span>
                                <span id="uppercaseText" class="text-gray-500">Mengandung huruf besar</span>
                            </div>
                            <div class="flex items-center text-xs">
                                <span class="w-2 h-2 rounded-full mr-2" id="numberCheck"></span>
                                <span id="numberText" class="text-gray-500">Mengandung angka</span>
                            </div>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                            Konfirmasi Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Ulangi password baru"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                                required />
                            <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" id="togglePasswordConfirm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="mt-2 text-xs text-gray-500" id="matchText">Password belum cocok</p>
                    </div>

                    <button type="submit"
                        class="w-full mt-6 py-3 px-4 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-200 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                        id="submitBtn" disabled>
                        Reset Password
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600 text-sm">
                        Kembali ke
                        <a href="/admin/login"
                            class="font-semibold text-cyan-600 hover:text-cyan-700 transition">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-cyan-500 to-cyan-600 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image:url('{{ Vite::asset('resources/assets/images/home.png') }}'); filter: brightness(0.7);">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const togglePasswordConfirmBtn = document.getElementById('togglePasswordConfirm');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('resetForm');

            // Toggle password visibility
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });

            togglePasswordConfirmBtn.addEventListener('click', function() {
                const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.setAttribute('type', type);
            });

            // Password strength validation
            passwordInput.addEventListener('input', function() {
                const password = this.value;

                // Length check
                const lengthCheck = document.getElementById('lengthCheck');
                const lengthText = document.getElementById('lengthText');
                if (password.length >= 8) {
                    lengthCheck.classList.add('bg-green-500');
                    lengthCheck.classList.remove('bg-gray-300');
                    lengthText.classList.add('text-green-600');
                } else {
                    lengthCheck.classList.remove('bg-green-500');
                    lengthCheck.classList.add('bg-gray-300');
                    lengthText.classList.remove('text-green-600');
                }

                // Uppercase check
                const uppercaseCheck = document.getElementById('uppercaseCheck');
                const uppercaseText = document.getElementById('uppercaseText');
                if (/[A-Z]/.test(password)) {
                    uppercaseCheck.classList.add('bg-green-500');
                    uppercaseCheck.classList.remove('bg-gray-300');
                    uppercaseText.classList.add('text-green-600');
                } else {
                    uppercaseCheck.classList.remove('bg-green-500');
                    uppercaseCheck.classList.add('bg-gray-300');
                    uppercaseText.classList.remove('text-green-600');
                }

                // Number check
                const numberCheck = document.getElementById('numberCheck');
                const numberText = document.getElementById('numberText');
                if (/[0-9]/.test(password)) {
                    numberCheck.classList.add('bg-green-500');
                    numberCheck.classList.remove('bg-gray-300');
                    numberText.classList.add('text-green-600');
                } else {
                    numberCheck.classList.remove('bg-green-500');
                    numberCheck.classList.add('bg-gray-300');
                    numberText.classList.remove('text-green-600');
                }

                validateForm();
            });

            // Password confirmation check
            passwordConfirmInput.addEventListener('input', function() {
                const matchText = document.getElementById('matchText');
                if (passwordInput.value === this.value && this.value.length > 0) {
                    matchText.textContent = '✓ Password cocok';
                    matchText.classList.add('text-green-600');
                    matchText.classList.remove('text-gray-500');
                } else if (this.value.length > 0) {
                    matchText.textContent = '✗ Password tidak cocok';
                    matchText.classList.add('text-red-600');
                    matchText.classList.remove('text-gray-500');
                } else {
                    matchText.textContent = 'Password belum cocok';
                    matchText.classList.remove('text-green-600', 'text-red-600');
                    matchText.classList.add('text-gray-500');
                }
                validateForm();
            });

            function validateForm() {
                const hasLength = passwordInput.value.length >= 8;
                const hasUppercase = /[A-Z]/.test(passwordInput.value);
                const hasNumber = /[0-9]/.test(passwordInput.value);
                const passwordsMatch = passwordInput.value === passwordConfirmInput.value && passwordConfirmInput.value.length > 0;

                submitBtn.disabled = !(hasLength && hasUppercase && hasNumber && passwordsMatch);
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const password = passwordInput.value;
                const passwordConfirm = passwordConfirmInput.value;

                if (password !== passwordConfirm) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Tidak Cocok!',
                        text: 'Pastikan password dan konfirmasi password sama',
                        confirmButtonColor: '#06b6d4'
                    });
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="inline-flex items-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Mereset...</span>';

                setTimeout(() => {
                    form.submit();
                }, 500);
            });

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
        });
    </script>
</body>

</html>
