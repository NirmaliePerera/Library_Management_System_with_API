<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Book Details</h1>

    @if($errors->any()) <!--if there is any error-->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) <!-- for all errors-->
                    <li>{{$error}}</li> <!-- we printout each error-->
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('book.update', ['book' => $book])}}">
        @csrf
        @method('put')

        <div>
            <div>
                <label for="title" class="form-label">Title: </label>
                <input type="text" name="title" class="form-control" value="{{$book->title}}">  
            </div>
        </div>

        <div>
            <div>
                <label for="author" class="form-label">Author: </label>
                <input type="text" name="author" class="form-control" value="{{$book->author}}">  
            </div>
        </div>

        <div>
            <div class="col-md-6">
                <label for="published_date" class="form-label">Published Date: </label>
                <input type="date" name="published_date" class="form-control" value="{{$book->published_date}}">    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="genre" class="form-label">Genre: </label>
                <select id="genre" name="genre" class="form-select" >
                    <option value="{{$book->genre}}"></option>
                    <option value="fiction">Fiction</option>
                    <option value="nonfiction">Nonfiction</option>
                    <option value="literary genres">Literary genres</option>
                    <option value="science fiction">Science fiction</option>
                    <option value="fantacy">Fantacy</option>
                    <option value="horror">Horror</option>
                    <option value="children clasic">Children clasic</option>
                    <option value="historical">Historical</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="availability_status" class="form-label">Availability Status: </label>
                <select id="availability_status" name="availability_status" class="form-select">
                    <option value="{{$book->availability_status}}"></option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
        </div>
    
        <div>
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </form>
</body>
</html>