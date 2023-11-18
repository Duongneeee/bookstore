<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Typebook;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'image',
        'description',
        'quantity',
        'price',
        'price_discount',
        'page',
        'publish_date',
        'typebook_id',
        'author_id',
        'publisher_id',
    ];

    public function typebook(){
        return $this->belongsTo(Typebook::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
