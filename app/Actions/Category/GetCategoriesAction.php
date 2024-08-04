<?php

namespace App\Actions\Category;

use App\Actions\AsAction;
use App\Models\Category;

class GetCategoriesAction extends AsAction
{
    public function handle()
    {
        return Category::query()->where('is_active' , 1)->paginate(10);
    }
}
