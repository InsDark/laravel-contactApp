<?php use App\Http\Controllers\UserController ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Document</title>
</head>
<body>
    @include ('layout.header')
    <main>
        <form action="{{action([UserController::class, 'make'])}}" method='post' id='register'>
            {{csrf_field()}}
            <h1>Register</h1>
            <label for="name">Name:</label>
            <input type="text" name='name'>
            
            <label for="email">Email:</label>
            <input type="email" name='email'>

            <label for="password">Password:</label>
            <input type="password" name='password'>

            <input type="submit" value='Register'>
        </form>
    </main>
</body>
</html>