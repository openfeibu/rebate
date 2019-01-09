<?php

namespace App\Http\Controllers\Wap;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\Theme\ThemeAndViews;
use App\Traits\RoutesAndGuards;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs,  ValidatesRequests, ThemeAndViews,RoutesAndGuards;
    /**
     * @var store response object
     */
    public $response;

    /**
     * @var store repository object
     */
    public $repository;

    public function __construct()
    {
        set_route_guard('web','user');
    }
}