<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrowed Books</title>
</head>
<body>
    <div class="container">
        <h1>Your Borrowed Books</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Number</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($borrowedBooks as $borrow)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $borrow->book->title }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No borrowed books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>



