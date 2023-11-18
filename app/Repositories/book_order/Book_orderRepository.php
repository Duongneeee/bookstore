<?php

namespace App\Repositories\Book_order;

use App\Models\Book_order;
use App\Repositories\BaseRepository;
use App\Repositories\Book_order\Book_orderRepositoryInterface;

class Book_orderRepository extends BaseRepository implements Book_orderRepositoryInterface{
    public function getModel()
    {
        return Book_order::class;
    }
}