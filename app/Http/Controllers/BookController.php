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
            'data' => $books->items(), 
            'total' => $books->total(), 
            'per_page' => $books->perPage(), 
            'current_page' => $books->currentPage(), 
            'last_page' => $books->lastPage() 
        ]);
    }
}

