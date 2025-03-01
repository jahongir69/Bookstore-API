<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);

        return BookResource::collection($books)->response()->getData(true);
    }
}
