<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Family Recipe Hub</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex min-h-screen">
        <div class="w-1/2 bg-background flex flex-col">
            <div class="w-full py-4 px-6 text-center flex items-center justify-center">
                <x-application-logo class="h-12 w-auto mr-4" />
                <a href="{{ url('/') }}">Recipe.thedigialex.net</a>
            </div>

            <div class="flex flex-col justify-center items-center flex-grow p-8">
                <h1>Family Recipe Hub</h1>
                <p>
                    Sign up to create your family or request to join an existing one.<br>Share and manage your family's favorite recipes all in one place.
                </p>

                <div id="form-container" class="w-full max-w-lg">
                    <div id="login-form" class="block">
                        @include('auth.login')
                    </div>

                    <div id="register-form" class="hidden">
                        @include('auth.register')
                    </div>

                </div>
                <div class="flex space-x-4 mb-8">
                    <x-primary-button id="toggle-button" onclick="toggleForms()">Register</x-primary-button>
                </div>
            </div>

            <div class="w-full py-2 px-4 text-center rounded-b-md shadow-md">
                <p>&copy; TheDigiAlex 2024</p>
            </div>
        </div>
        <div class="w-1/2 bg-cover bg-no-repeat bg-center rounded-r-md shadow-md" style="background-image: url('/login_page_image.jpg');"></div>
    </div>

    <script>
        function toggleForms() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            var toggleButton = document.getElementById('toggle-button');

            if (loginForm.classList.contains('block')) {
                loginForm.classList.remove('block');
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                registerForm.classList.add('block');
                toggleButton.textContent = 'Login';
            } else {
                loginForm.classList.remove('hidden');
                loginForm.classList.add('block');
                registerForm.classList.remove('block');
                registerForm.classList.add('hidden');
                toggleButton.textContent = 'Register';
            }
        }
    </script>

</body>

</html>