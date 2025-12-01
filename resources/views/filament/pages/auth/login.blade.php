<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Inventaris</title>
    <script defer src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Left Section - Login Form -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 md:px-16 py-12 bg-white">
            <div class="max-w-md mx-auto w-full">
                <!-- Logo -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-cyan-400 rounded"></div>
                        <span class="text-lg font-semibold text-gray-800">Login</span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Login</h1>
                <p class="text-gray-600 text-sm mb-8">Login untuk mendapatkan akses sebagai Admin</p>

                <!-- Google Sign In Button -->
                <button type="button" class="w-full py-3 px-4 border border-gray-300 rounded-full text-gray-700 font-medium flex items-center justify-center gap-2 hover:bg-gray-50 mb-6 transition">
                    <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                    Sign in with google
                </button>

                <!-- Form -->
                <form wire:submit.prevent="authenticate" class="space-y-6">
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email*</label>
                        <input 
                            type="email" 
                            wire:model="email"
                            placeholder="masukkan email anda" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 @error('email') border-red-500 @enderror"
                            required
                            autofocus
                        />
                        @error('email')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password*</label>
                        <input 
                            type="password" 
                            wire:model="password"
                            placeholder="minimal 8 karakter" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required
                        />
                    </div>

                    <!-- Remember & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" wire:model="remember" class="w-4 h-4 text-cyan-400 rounded border-gray-300" />
                            <span class="text-sm text-gray-700">Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm text-cyan-400 hover:text-cyan-500 font-medium">Lupa Password?</a>
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition"
                    >
                        Login
                    </button>
                </form>

                <!-- Sign Up Link -->
                <div class="mt-8 text-center text-sm text-gray-600">
                    Belum memiliki akun? <a href="#" class="text-cyan-400 font-semibold hover:text-cyan-500">Buat akun baru</a>
                </div>
            </div>
        </div>

        <!-- Right Section - Image -->
        <div class="hidden md:flex md:w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80');">
            <div class="w-full h-full bg-black/20"></div>
        </div>
    </div>
</body>
</html>
