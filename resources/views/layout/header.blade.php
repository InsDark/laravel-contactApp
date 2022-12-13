<?php use App\Http\Controllers\UserController; ?>
<header>
    <h2>Contacts App</h2>
    <section>
        @if (session('identity')) 
        <h3><a href="{{action([UserController::class, 'logout'])}}">Log Out</a></h3>
        @else 
        <h3><a href="{{action([UserController::class, 'login'])}}">Login</a></h3>
        <h3><a href="{{action([UserController::class, 'register'])}}">Register</a></h3>
        @endif
    </section>
</header>