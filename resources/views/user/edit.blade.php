<?php use App\Http\Controllers\UserController?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/app.css">
    <title>Contacts App - Edit</title>
</head>
<body>
    @include('layout.header')
    <main id ='edit'>
        <form action="{{action([UserController::class, 'update'])}}" method='POST'>
            {{csrf_field()}}
            <h1>{{$contact->contact_name}} Info</h1>

            <label for="name">Contact Name:</label>
            <input type="text" name='name' value='{{$contact->contact_name}}'>

            <label for="name">Contact Last Name:</label>
            <input type="text" name='last-name' value='{{$contact->contact_last_name}}'>

            <label for="name">Contact Phone:</label>
            
            <input type="number" name='phone' value='{{$contact->contact_phone}}'>

            <input type="hidden" name='id' value='{{$contact->id}}'>

            <input type="submit" value='Update Contact'>

        </form>
    </main>
</body>
</html>