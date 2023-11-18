<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepositoryInterface;

class BookRepository extends BaseRepository implements BookRepositoryInterface{
    public function getModel()
    {
        return Book::class;
    }
}