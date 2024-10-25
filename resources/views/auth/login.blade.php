<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-norbert{
            background-image: url(/images/norbert_bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-norbert">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Welcome Back</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input id="email" type="email" name="email" required autofocus
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember"
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>
            </div>
            <div>
                <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Login</button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot your password?</a>
        </div>
    </div>
    <div class="bg-black bg-opacity-50  text-gray-300 absolute bottom-0 w-full text-sm text-center opacity-45 py-3 flex flex-row justify-center align-text-bottom">
        <p>Developed and tested by :</p>
        <div class="mx-2 text-blue-400"><a href="https://github.com/Mikazuk1" target="blank">Michael Linao</a></div>
        <p>& </p>
        <div class="ml-2 mr-2 text-blue-400"><a href="https://github.com/llAlcatrazll" target="blank">Alexis Magaway</a></div>
        <p>© 2024 All Rights Reserved. Cor Jesu College</p>
    </div>
</body>

</html>
