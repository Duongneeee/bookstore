<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use App\Repositories\BaseRepository;
use App\Repositories\Discount\DiscountRepositoryInterface;

class DiscountRepository extends BaseRepository implements DiscountRepositoryInterface{
    public function getModel()
    {
        return Discount::class;
    }
}