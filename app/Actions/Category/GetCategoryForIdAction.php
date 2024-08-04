<?php

namespace App\Actions\Category;

use App\Actions\AsAction;
use App\Models\Category;

class GetCategoryForIdAction extends AsAction
{
    public function handle(?int $id = 0)
    {
        return Category::query()->where('is_active' , 1)->find($id);
    }
}
