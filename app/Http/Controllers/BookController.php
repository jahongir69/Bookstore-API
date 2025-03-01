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

    return response()->json([
        'data'  => BookResource::collection($books),
        'meta'  => [
            'current_page' => $books->currentPage(),
            'last_page'    => $books->lastPage(),
            'per_page'     => $books->perPage(),
            'total'        => $books->total(),
        ],
        'links' => [
            'first' => $books->url(1),
            'last'  => $books->url($books->lastPage()),
            'prev'  => $books->previousPageUrl(),
            'next'  => $books->nextPageUrl(),
        ]
    ]);
}

}

