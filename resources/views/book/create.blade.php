<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Add New Book</h1>

    <a href="{{ route('book.index') }}" class="btn btn-secondary mt-2 btn-sm">Back to Books</a>

    <form  class="mt-5"  method="POST" action="{{ route('book.store') }}">
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
            <input type="text" class="form-control" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Enter author">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" placeholder="Enter stock">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</body>
</html>
