<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Report;
use App\Models\Location;
use App\Models\Place;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Form::macro('labelWithHTML', function ($html) {
            echo '<label>'.'<input type="checkbox" name="remember" >'.$html.'</label>';
        });

        view()->composer(['backend.layout.left-side-bar'], function ($view) {
            $countReport = Report::count();
            $countPlace = Location::count();
            $view->with([
                'countReport' => $countReport,
                'countPlace' => $countPlace,
            ]);
        });

        view()->composer(['frontend.layout.right-slide'], function ($view) {
            $topPlaces = Place::orderBy('total_rate', 'DESC')->take(5)->get();
            $view->with([
                'topPlaces' => $topPlaces,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\Eloquents\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CategoryRepositoryInterface',
            'App\Repositories\Eloquents\CategoryRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ReviewRepositoryInterface',
            'App\Repositories\Eloquents\ReviewRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\PlaceRepositoryInterface',
            'App\Repositories\Eloquents\PlaceRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ImageRepositoryInterface',
            'App\Repositories\Eloquents\ImageRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CityRepositoryInterface',
            'App\Repositories\Eloquents\CityRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\DistrictRepositoryInterface',
            'App\Repositories\Eloquents\DistrictRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\RateReviewValRepositoryInterface',
            'App\Repositories\Eloquents\RateReviewValRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\RateReviewRepositoryInterface',
            'App\Repositories\Eloquents\RateReviewRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CommentRepositoryInterface',
            'App\Repositories\Eloquents\CommentRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ReportRepositoryInterface',
            'App\Repositories\Eloquents\ReportRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CollectionRepositoryInterface',
            'App\Repositories\Eloquents\CollectionRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\LocationRepositoryInterface',
            'App\Repositories\Eloquents\LocationRepository'
        );
    }
}
