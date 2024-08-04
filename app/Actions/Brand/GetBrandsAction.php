<?php

namespace App\Actions\Brand;

use App\Actions\AsAction;
use App\Models\Brand;

class GetBrandsAction extends AsAction
{
    public function handle()
    {
        return Brand::query()->paginate(10);
    }
}
