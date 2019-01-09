<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\VipRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class VipRepository extends BaseRepository implements VipRepositoryInterface
{
    public function model()
    {
        return config('model.vip.vip.model');
    }
}