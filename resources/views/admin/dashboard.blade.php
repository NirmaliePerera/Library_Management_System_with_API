<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex mt-6 justify-center font-sans text-blue-600 text-3xl font-bold">
        <h1>ADMIN DASHBOARD</h1>
    </div>
    
    <div class="flex justify-center">
        <div class="flex flex-col space-y-2 text-base pt-3">

            <div>
                <div class="flex rounded-lg border-2 border-gray-400">
                    <a href="{{ route('book.index') }}" class="btn btn-primary">
                        {{ __('View Book Details') }}
                    </a>
                </div>
            </div>
            
            <div>
                <div class="flex rounded-lg border-2 border-gray-400">
                    <a href="{{ route('book.create') }}" class="btn btn-primary">
                        {{ __('Add Book Details') }}
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="flex justify-center pt-4">
        <div class="flex rounded-lg border-2 border-gray-500">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
        
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>    
    
</body>
</html>