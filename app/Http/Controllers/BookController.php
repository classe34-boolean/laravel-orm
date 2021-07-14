<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index() {
        $title = "I nostri libri";

        // SELECT * FROM `books`;
        // $books = Book::all();

        // SELECT * FROM `books` WHERE `author` = 'Dan Brown'
        // $books = Book::where('author', 'Dan Brown')
        //     ->get();

        // SELECT * FROM `books` WHERE `price` < 10 OR `title` LIKE 'L%'
        $query = Book::where('price', '<', 10)
            ->orWhere('title', 'LIKE', 'L%')
            ->orderBy('price', 'ASC')
            ->limit(1);
        dump($query->toSql());
        dump($query->getBindings());
        $books = $query->get();

        // $books = Book::where('price', '<', 10)
        //     ->orderBy('price', 'ASC')
        //     ->limit(1)
        //     ->get();
        // dump($books);

        // $books = Book::where('price', '<', 10)
        //     ->orderBy('price', 'ASC')
        //     ->first();
        // dump($books->title);    
        // dd($books);    

        // [
        //     'title' => $title,
        //     'books' => $books
        // ]

        // $singleBook = Book::find(5);
        // dd($singleBook);

        return view('home', compact('title', 'books'));
    }
}
