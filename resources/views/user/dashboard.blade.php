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
    <main id='dashboard'>
        <section>
            <h1>My Contacts</h1>
            @if (count($contacts) > 0)
            <div class='contacts-list'>
                @foreach ($contacts as $contact)
                <div class='contact-item'>
                    
                    <h3>{{ $contact->contact_name}} Info:</h3>
                    <h4>Last Name: {{ $contact->contact_last_name}}</h4>
                    <h4>Phone: {{ $contact->contact_phone}}</h4>
                    <div>
                        <a href="{{action([UserController::class, 'edit'], ['id'=> $contact->id])}}">Edit</a>
                        <a href="{{action([UserController::class, 'delete'], ['id'=> $contact->id])}}">Delete</a>
                    </div>
                </div>
                @endforeach
                @else
                <h2>You dont have contacts</h2>
                @endif
            </div>
        </section>
        <section>
            <form action="{{action([UserController::class, 'createContact'])}}" method='POST'>
                {{csrf_field()}}
                <h2>Create Contact</h2>

                <label for="name">Contact Name:</label>
                <input type="text" name='name' >

                <label for="name">Contact Last Name:</label>
                <input type="text" name='last-name'>

                <label for="name">Contact Phone:</label>

                <input type="number" name='phone'>

                <input type="hidden" name='id'>

                <input type="submit" value='Create Contact'>

            </form>
        </section>
    </main>
</body>
</html>