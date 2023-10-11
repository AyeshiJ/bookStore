<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body class="container">

    <h1>All Books</h1>

    <a href="{{route('book.create')}}" class="btn btn-success mt-5"><i class="fas fa-plus"></i> Create</a>

<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book Title</th>
      <th scope="col">Author Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)


    {{-- @foreach ($products as $product) --}}
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->stock }}</td>

      <td>
        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary ">Edit</a>
        <form method="POST" action="{{ route('book.destroy', $book->id) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
        </form>
    </td>
    <td>
        <form method="POST" action="{{ route('book.issue', $book) }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-success">Issue</button>
        </form>
        <form method="POST" action="{{ route('book.return', $book) }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary">Return</button>
        </form>
    </td>

    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
