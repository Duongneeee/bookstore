<?php

namespace App\Repositories\Typebook;

use App\Models\Typebook;
use App\Repositories\BaseRepository;
use App\Repositories\Typebook\TypebookRepositoryInterface;

class TypebookRepository extends BaseRepository implements TypebookRepositoryInterface{
    public function getModel()
    {
        return Typebook::class;
    }
}