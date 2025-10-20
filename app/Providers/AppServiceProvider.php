<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\App; 
use App\Models\StudentReview;    
use App\Models\Notice;    

class AppServiceProvider extends ServiceProvider
{
    public function register(): void{
        //
    }
    public function boot(): void{
        $app = App::first(); View::share('app', $app);
        $reviews = StudentReview::latest()->get(); View::share('reviews', $reviews);
        $notices = Notice::latest()->get(); View::share('notices', $notices);
    }
}
