<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Family Recipe Hub</title>
    <link rel="icon" href="{{ asset('recipe-logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex min-h-screen">
        <div class="w-full sm:w-1/2 bg-backgroundAccent flex flex-col">
            <div class="flex flex-col justify-center items-center flex-grow p-2">
                <x-application-logo class="h-48 w-48" />
                <x-fonts.header>Family Recipe Hub</x-fonts.header>
                <x-fonts.paragraph class="hidden sm:block">
                    Sign up to create your family or request to join an existing one.<br>
                    Share and manage your family's favorite recipes all in one place.
                </x-fonts.paragraph>
                <div id="form-container" class="w-full max-w-lg">
                    <div id="login-form" class="form block">
                        @include('auth.login')
                    </div>
                    <div id="register-form" class="form hidden">
                        @include('auth.register')
                    </div>
                    <div id="forgot-form" class="form hidden">
                        @include('auth.forgot-password')
                    </div>
                </div>
                <div class="flex space-x-4 mb-8">
                    <x-primary-button id="toggle-button" onclick="toggleForms()">Register</x-primary-button>
                    <x-primary-button onclick="showForm('forgot-form')">Forgot Password?</x-primary-button>
                </div>
            </div>

            <div class="w-full py-2 px-4 text-center rounded-b-md shadow-md hidden sm:block"> <!-- Hidden on mobile -->
                <x-fonts.paragraph>&copy; TheDigiAlex 2024</x-fonts.paragraph>
            </div>
        </div>
        <div class="w-1/2 bg-cover bg-no-repeat bg-center rounded-r-md shadow-md hidden sm:block" style="background-image: url('/login_page_image.jpg');"></div>
    </div>
    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const toggleButton = document.getElementById('toggle-button');

            // Hide the forgot form if it's shown
            document.getElementById('forgot-form').classList.add('hidden');

            // Toggle between login and register forms
            if (loginForm.classList.contains('hidden')) {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                toggleButton.textContent = 'Register';
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                toggleButton.textContent = 'Login';
            }
        }

        function showForm(formId) {
            const forms = document.querySelectorAll('.form');
            forms.forEach(form => form.classList.add('hidden'));

            const selectedForm = document.getElementById(formId);
            selectedForm.classList.remove('hidden');
        }
    </script>

</body>

</html>