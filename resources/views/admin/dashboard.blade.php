<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ADMIN</h1>
    <div>
        <a href="{{ route('book.index') }}" class="btn btn-primary">
            {{ __('View Book Details') }}
        </a>
    </div>
    
    <div>
        <a href="{{ route('book.create') }}" class="btn btn-primary">
            {{ __('Add Book Details') }}
        </a>
    </div>


    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
</body>
</html>