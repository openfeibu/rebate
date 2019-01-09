<?php

namespace App\Http\Controllers\Wap;

use Route,Auth,Theme;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Http\Response\ResourceResponse;
use App\Traits\Theme\ThemeAndViews;
use App\Traits\RoutesAndGuards;
use App\Models\AccountRebate;

class RebateController extends BaseController
{
    use ThemeAndViews,RoutesAndGuards;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:user.web');
        $this->response = app(ResourceResponse::class);
        $this->setTheme();
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $rebates = AccountRebate::where('UserID',Auth::user()->UserID)->orderBy('RebateID','DESC')->paginate('10');

        if ($this->response->typeIs('json')) {

            $data['content'] = $this->response->layout('render')
                ->view('rebate.list')
                ->data(compact('rebates'))->render()->getContent();

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.name'))
            ->view('rebate.home')
            ->data(compact('rebates'))
            ->output();
    }

}
