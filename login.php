<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body>
    <div class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">
        <form class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" action="action-login.php" method="post">
            <label class="font-semibold text-xs" for="usernameField">Username</label>
            <input class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" name="username">
            <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
            <input class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password" name="password">
            <input class="cursor-pointer flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700" type="submit" value="Login"></input>
        </form>
</body>

</html>