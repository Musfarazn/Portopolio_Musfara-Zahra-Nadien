<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-teal-600">

    <div class="bg-white rounded-2xl shadow-lg flex overflow-hidden w-[850px]">
        <!-- Left side (illustration) -->
        <div class="w-1/2 bg-[#F4E9D7] flex items-center justify-center p-8">
            <img src="img/register.png"
                 alt="Register Illustration"
                 class="w-500 h-200 object-contain">
        </div>

        <!-- Right side (form) -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-lg font-semibold text-center mb-6">
                Please Fill out form to Register!
            </h2>

            <!-- Form Register -->
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="name" placeholder="isilah dengan NIM"
                       class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">

                <!-- Password -->
                <div class="relative">
                    <input id="password" type="password" name="password" placeholder="Password"
                           class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 pr-10">
                    <button type="button" onclick="togglePassword('password', this)" 
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                        <!-- Mata tertutup -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-closed" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M21 21l-6-6m-2.12-2.12a9 9 0 01-12-4.24 9 9 0 0112-4.24"/>
                        </svg>
                        <!-- Mata terbuka -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-open hidden" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password"
                           class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 pr-10">
                    <button type="button" onclick="togglePassword('password_confirmation', this)" 
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                        <!-- Mata tertutup -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-closed" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M21 21l-6-6m-2.12-2.12a9 9 0 01-12-4.24 9 9 0 0112-4.24"/>
                        </svg>
                        <!-- Mata terbuka -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-open hidden" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>

                <input type="text" name="nama" placeholder="Nama"
                       class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">

                <input type="number" name="umur" placeholder="Umur"
                       class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">

                <input type="text" name="prodi" placeholder="Prodi"
                       class="w-full p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">

                <button type="submit"
                        class="w-full py-3 rounded-full bg-yellow-400 text-white font-semibold hover:bg-yellow-500 transition">
                    Register
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                Yes I have an account?
                <a href="{{ route('login') }}" class="text-teal-600 font-semibold hover:underline">Login</a>
            </p>
        </div>
    </div>

    <!-- Script Show/Hide Password -->
    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const eyeOpen = btn.querySelector('.eye-open');
            const eyeClosed = btn.querySelector('.eye-closed');

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                input.type = "password";
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>
