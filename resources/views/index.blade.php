<?php  use App\Http\Controllers\UserController?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Contacs App</title>
</head>
<body>
    @include('layout.header')
    <main>
        <h1>Welcome To Contacs App</h1>
        <p>The place where you can manage your Contacs</p>
        <a href="{{action([UserController::class, 'login'])}}">Get Started</a>
    </main>
</body>
</html>