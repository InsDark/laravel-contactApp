<?php use App\Http\Controllers\UserController?>
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
        <form action="{{action([UserController::class, 'loger'])}}" method='post' id='login'>
            {{csrf_field()}}
            <h1>Login</h1>
            <label for="email">Email:</label>
            <input type="text" name='email'>

            <label for="password">Password:</label>
            <input type="text" name='password'>

            <input type="submit" value='Log In'>
        </form>
    </main>
</body>
</html>