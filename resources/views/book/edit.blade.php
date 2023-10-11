<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABC Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
    <form class="mt-5" action="{{route('book.update', $book->id)}}" method="POST">
        @method('PUT')
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$book->title}}" placeholder="Enter book title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" value="{{$book->author}}" placeholder="Enter author name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" value="{{$book->price}}" placeholder="Enter book price">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" value="{{$book->stock}}" placeholder="Enter stock count">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</body>
</html>
