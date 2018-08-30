<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Book;
use App\Category;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $books=Book::latest()->limit(8)->get();
        View::share('books', $books);
        $publishers=User::all();
        View::share('publishers', $publishers);
        $categories=Category::all();
        view::share('categories',$categories);
        $slider_books=Book::inRandomOrder()->get();
        view::share('slider_books',$slider_books);
        $book_count=Book::all()->count();
        view()->share('book_count', $book_count);

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
