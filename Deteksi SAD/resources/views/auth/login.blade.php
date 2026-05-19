<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-teal-600 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-xl shadow-lg flex max-w-4xl w-full overflow-hidden">
        <!-- Left Side (Form) -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-center mb-6">Welcome !!</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Username:</label>
                    <input type="text" name="name" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4 relative">
                    <label class="block text-gray-700">Password:</label>
                    <input id="password" type="password" name="password" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 pr-10">

                    <!-- Tombol Mata -->
                    <button type="button" 
                            onclick="togglePassword('password', this)" 
                            class="absolute right-3 top-9 text-gray-500">

                        <!-- Mata tertutup -->
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5 eye-closed" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M21 21l-6-6m-2.12-2.12a9 9 0 01-12-4.24 9 9 0 0112-4.24"/>
                        </svg>

                        <!-- Mata terbuka -->
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5 eye-open hidden" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>

                <button type="submit" class="w-full bg-yellow-400 text-white py-2 rounded-lg hover:bg-yellow-500 transition">
                    Login
                </button>
            </form>

            <p class="text-sm text-center mt-4 text-gray-600">
                Don’t have an account? 
                <a href="{{ route('register') }}" class="text-blue-500 font-semibold">Register</a>
            </p>
        </div>

        <!-- Right Side (Image) -->
        <div class="w-1/2 bg-teal-600 flex items-center justify-center">
            <img src="{{ asset('img/login.png') }}" alt="Illustration" class="w-[800px] h-auto">
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
