<?php

namespace App\Http\Controllers\Wap;

use Route;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Http\Response\ResourceResponse;
use App\Models\Vip;
use App\Models\Account;
use App\Models\AccountVip;
use Auth;

class HomeController extends BaseController
{


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
        $vips = Vip::orderBy('VipID','asc')->get();
        $account  = Auth::user();
        $account_vip = app(Account::class)->vip($account->UserID);
        return $this->response->title(trans('app.name'))
            ->view('home')
            ->data(compact('vips','account','account_vip'))
            ->output();
    }

}
