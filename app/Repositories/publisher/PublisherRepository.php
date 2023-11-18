<?php

namespace App\Repositories\Publisher;

use App\Models\Publisher;
use App\Repositories\BaseRepository;
use App\Repositories\Publisher\PublisherRepositoryInterface;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface{
    public function getModel()
    {
        return Publisher::class;
    }
}