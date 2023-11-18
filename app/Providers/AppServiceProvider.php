<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Book\BookRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Author\AuthorRepository;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Discount\DiscountRepository;
use App\Repositories\Tyepbook\TypebookRepository;
use App\Repositories\Publisher\PublisherRepository;
use App\Repositories\Book_order\Book_orderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            TypebookRepository::class,
            AuthorRepository::class,
            BookRepository::class,
            Book_orderRepository::class,
            CommentRepository::class,
            DiscountRepository::class,
            OrderRepository::class,
            PublisherRepository::class,
            RoleRepository::class,
            UserRepository::class,
       );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
