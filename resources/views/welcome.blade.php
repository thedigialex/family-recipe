<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Family Recipe Hub</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            background-color: #FFF5E1;
            /* Cream background */
            color: #2F4F4F;
            /* Dark Green text color */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .bg-primary {
            background-color: #6B8E23;
            /* Olive Green */
        }

        .text-primary {
            color: #6B8E23;
            /* Olive Green */
        }

        .bg-secondary {
            background-color: #C1C7B7;
            /* Sage Green */
        }

        .text-secondary {
            color: #C1C7B7;
            /* Sage Green */
        }

        .bg-accent {
            background-color: #CC5500;
            /* Burnt Orange */
        }

        .text-accent {
            color: #CC5500;
            /* Burnt Orange */
        }

        .btn {
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            color: #FFF;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            font-weight: 600;
        }

        .btn:hover {
            color: #FFF5E1;
            /* Hover text color */
        }

        .centered-container {
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #6B8E23;
            /* Olive Green */
        }

        .description {
            font-size: 1.25rem;
            margin-bottom: 40px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>

<body>
    <div class="centered-container">
        <img src="\Recipe-logo.png" alt="Family Recipe Hub Logo" class="logo">
        <h1 class="title">Family Recipe Hub</h1>
        <p class="description">Sign up to create your family or request to join an existing one.</br>Share and manage your family's favorite recipes all in one place.</p>
        <div class="button-group">
            <a href="{{ route('register') }}" class="btn bg-primary">Sign Up</a>
            <a href="{{ route('login') }}" class="btn bg-accent">Log in</a>
        </div>
    </div>
</body>

</html>