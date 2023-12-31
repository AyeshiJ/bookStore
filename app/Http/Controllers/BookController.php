<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\ReturnedBook;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function create(){

        return view('book.create');
    }

    public function store(Request $request){
        // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    // Create a new book instance and set its attributes
    $book = new Book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->price = $request->price;
    $book->stock = $request->stock;

    // Save the book to the database
    $book->save();

    // Redirect to the list of books with a success message
    return redirect()->route('books.index')->with('success', 'Book added successfully');
    }
    public function edit($id){
                 $book = Book::where("id", $id)->first();
                 return view('book.edit',compact(("book")));
            }
            public function update(Request $request, $id) {
                // Validate the request data
                $request->validate([
                    'title' => 'required|string|max:255',
                    'author' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0',
                    'stock' => 'required|integer|min:0',
                ]);

                // Find the book by ID
                $book = Book::findOrFail($id);

                // Update the book's attributes
                $book->title = $request->title;
                $book->author = $request->author;
                $book->price = $request->price;
                $book->stock = $request->stock;

                // Save the changes to the database
                $book->save();

                // Redirect to the list of books with a success message
                return redirect()->route('book.index')->with('success', 'Book updated successfully');
            }

            public function destroy($id) {
                // Find the book by ID
                $book = Book::findOrFail($id);

                // Delete the book
                $book->delete();

                // Redirect to the list of books with a success message
                return redirect()->route('book.index')->with('success', 'Book deleted successfully');
            }
            public function issue(Book $book) {
                // Get the currently authenticated user
                $user = auth()->user();

                // Check if the user is allowed to issue a book (e.g., stock should be greater than 0)
                if ($book->stock > 0) {
                    // Update the book's stock
                    $book->stock -= 1;
                    $book->save();

                    // Create a new IssuedBook record and associate it with the user and book
                    IssuedBook::create([
                        'user_id' => $user->id,
                        'book_id' => $book->id,
                    ]);

                    // Redirect back to the book listing with a success message
                    return redirect()->route('book.index')->with('success', 'Book issued successfully');
                } else {
                    return redirect()->route('book.index')->with('error', 'There are no available books');
                }
            }

            public function return(Book $book) {
                // Get the currently authenticated user
                $user = auth()->user();

                // Update the book's stock
                $book->stock += 1;
                $book->save();

                // Create a new ReturnedBook record and associate it with the user and book
                ReturnedBook::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                ]);

                // Redirect back to the book listing with a success message
                return redirect()->route('book.index')->with('success', 'Book returned successfully');
            }

}
