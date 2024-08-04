<?php

namespace App\Actions\Brand;

use App\Actions\AsAction;
use App\Models\Brand;

class GetBrandForIdAction extends AsAction
{
    public function handle(?int $id = 0)
    {
        return Brand::query()->find($id);
    }
}
