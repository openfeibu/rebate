<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\AccountRebateRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class AccountRebateRepository extends BaseRepository implements AccountRebateRepositoryInterface
{
    public function model()
    {
        return config('model.account.account_rebate.model.model');
    }
}