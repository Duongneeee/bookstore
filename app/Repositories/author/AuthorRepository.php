<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;
use App\Repositories\Author\AuthorRepositoryInterface;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface{
    public function getModel()
    {
        return Author::class;
    }
}