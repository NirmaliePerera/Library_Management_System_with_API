<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex mt-6 justify-center  font-serif text-blue-600 text-3xl font-semibold">
            <h1>Add a Book</h1>
    </div>
    
        @if($errors->any()) <!--if there is any error-->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error) <!-- for all errors-->
                        <li>{{$error}}</li> <!-- we printout each error-->
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="flex justify-center">   
        <form method="post" action="{{route('book.store')}}">
            @csrf
            @method('post')
    
            <div class="pt-2 pb-3">
                <div>
                    <label for="title" class="form-label">Title: </label>
                    <input type="text" name="title" class="form-control" id="title">  
                </div>
            </div>
    
            <div class="pt-2 pb-3">
                <div>
                    <label for="author" class="form-label">Author: </label>
                    <input type="text" name="author" class="form-control" id="author">  
                </div>
            </div>
    
            <div class="pt-2 pb-3">
                <div>
                    <label for="published_date" class="form-label">Published Date: </label>
                    <input type="date" name="published_date" class="form-control" id="published_date">    
                </div>
            </div>
    
            <div class="pt-2 pb-3">
                <div>
                    <label for="genre" class="form-label">Genre: </label>
                    <select id="genre" name="genre" class="form-select" required>
                        <option value="blank"></option>
                        <option value="fiction">Fiction</option>
                        <option value="nonfiction">Nonfiction</option>
                        <option value="literary_genres">Literary genres</option>
                        <option value="science_fiction">Science fiction</option>
                        <option value="fantacy">Fantacy</option>
                        <option value="horror">Horror</option>
                        <option value="children_clasic">Children clasic</option>
                        <option value="historical">Historical</option>
                    </select>
                </div>
            </div>
    <!--
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="availability_status" class="form-label">Availability Status: </label>
                    <select id="availability_status" name="availability_status" class="form-select" required>
                        <option value="blank"></option>
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
            </div>
        -->
            <div class="pt-2 pb-2">
                <div class="flex rounded-lg justify-center border-4 border-blue-500">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Book') }}
                    </button>
                </div>
            </div>

            <div class="pt-2">
                <div class="flex rounded-lg justify-center border-4 border-black">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        {{ __('Go back to dashboard') }}
                    </a>
                </div>
            </div>
            
        </form>
    </div>
    
</body>
</html>