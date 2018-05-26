<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Report;
use App\Models\Location;
use App\Models\Place;
use App\Models\Category;
use App\Models\Notification;
use Auth;
use Log;

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

        view()->composer(['frontend.layout.header'], function ($view) {
            $cateParent = Category::where('parent_id', null)->get();
            $cateChild = [];
            if (is_array($cateParent) || is_object($cateParent))
            {
                foreach ($cateParent as $value) {
                    $cateChild[$value->id] = Category::where('parent_id', $value->id)->get();
                }
            }
            $notifications = Notification::orderBy('id', 'desc')->get();
            $countNotification = 0;
            if(Auth::check()) {
                foreach ($notifications as $notification) {
                    if($notification->review->user_id == Auth::user()->id  && $notification->status == config('notification.notseen')) {
                        $countNotification++;
                    }
                }
            }
            $view->with([
                'cateParent' => $cateParent,
                'cateChild' => $cateChild,
                'notifications' => $notifications,
                'countNotification' => $countNotification,
            ]);
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
        $this->app->bind(
            'App\Repositories\Contracts\CategoryValRepositoryInterface',
            'App\Repositories\Eloquents\CategoryValRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\NotificationRepositoryInterface',
            'App\Repositories\Eloquents\NotificationRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\FollowRepositoryInterface',
            'App\Repositories\Eloquents\FollowRepository'
        );
    }
}
