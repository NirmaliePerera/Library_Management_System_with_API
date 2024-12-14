<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Details of Books</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}} <!-- 'success' from EmployeeController-->
            </div>
        @endif()
    </div>
    <div>
        <table class="table table-bordered table-striped" >
            <thead class="thead-dark">
                <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Genre</th>
                    <th>Availability Status</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book) <!-- $books from BookController 'books', "($books as $book)"loops through each book-->
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->published_date}}</td>
                        <td>{{$book->genre}}</td>
                        <td>{{$book->availability_status}}</td>
                        <td>                           <!--This $book is passed to this 'book' from route {book},, "['book' => $book]" array -->
                            <a href="{{route('book.edit', ['book' => $book])}}" class="btn btn-edit btn-sm">Edit</a>
                        </td><!-- loop through each iteam and put edit link-->
                        
                        <!--To delete data, use form-->
                        <td> <!--In Laravel, do not create a link directly in action, instead use a route name to generate a link-->
                            <form method="post" action="{{route('book.destroy', ['book' => $book])}}"> <!-- say what book you want to delete-->
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-delete btn-sm">
                            </form>
                        </td>
                        <td>
                            @if($book->availability_status === 'unavailable')
                                <form method="post" action="{{ route('borrow.returnBook', ['book' => $book->id]) }}">
                                    @csrf
                                    <input type="submit" value="Mark as Returned" class="btn btn-success btn-sm">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>