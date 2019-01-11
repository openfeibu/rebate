<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Vip;
use App\Models\VipRebate;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\VipRebateRepositoryInterface;

class VipRebateResourceController extends BaseController
{
    public function __construct(VipRebateRepositoryInterface $vip_rebate_repository)
    {
        parent::__construct();
        $this->repository = $vip_rebate_repository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $data = app(VipRebate::class)
                ->Join('Vips','Vips.VipID','=','VipRebates.VipID')
                ->orderBy('Vips.VipID','asc')
                ->orderBy('VipRebates.Rank','asc')
                ->select('VipRebates.*','Vips.VipName')
                ->get();
            $data = $data ? $data->toArray() : [];
            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('vip_rebate.index')
            ->output();
    }

    public function update(Request $request,VipRebate $vip_rebate)
    {
        try {
            $attributes = $request->all();

            $vip_rebate->update($attributes);

            return $this->response->message(trans('messages.success.update', ['Module' => 'VIP返佣']))
                ->code(0)
                ->status('success')
                ->url(guard_url('vip_rebate/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('vip_rebate/'))
                ->redirect();
        }
    }


}
