<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\VipRebateRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class VipRebateRepository extends BaseRepository implements VipRebateRepositoryInterface
{
    public function model()
    {
        return config('model.account.vip_rebate.model.model');
    }
}