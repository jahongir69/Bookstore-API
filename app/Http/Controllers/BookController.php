<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
public function index(Request $request)
{
    $perPage = $request->get('per_page', 10);
    $books = Book::paginate($perPage);

    return BookResource::collection($books);
}

}

