<?php
    namespace App\Providers;


    use Illuminate\Support\ServiceProvider;

    class %Module%ServiceProvider extends ServiceProvider
    {
        public function register()
        {

        }

        public function boot()
        {
            \Route::prefix('~url_rpefix~')
                ->namespace('%namespace%\Http\Controllers')
                ->group(base_path('modules/~root~/routes/web.php'));
        }
    }
