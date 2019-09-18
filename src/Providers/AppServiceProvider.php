<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019-09-07
 * Time: 14:58
 */

namespace JoseChan\App\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class AppServiceProvider extends RouteServiceProvider
{
    protected $namespace = "JoseChan\App\Api\Controllers";

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . "../../routes/routes.php");
    }

}