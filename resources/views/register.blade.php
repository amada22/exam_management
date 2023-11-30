<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-indigo-800 flex items-center justify-center h-screen">
    <div class="bg-indigo-200 p-8 rounded shadow-md w-96">
        <h2 class="text-3xl font-semibold mb-4 text-green-800">Register</h2>

        <form>
        
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-green-800">Username</label>
                <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-green-800">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-green-800">Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-green-800">Confirme Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded">
            </div>
            <button type="submit" class="bg-indigo-800 text-white py-2 px-4 rounded hover:bg-green-600">Register</button>
        </form>
    </div>
</body>
</html>
