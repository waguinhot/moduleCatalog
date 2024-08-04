<?php

namespace App\Actions\Category;

use App\Actions\AsAction;
use App\Models\Category;

class DeleteCategoryAction extends AsAction
{
    public function handle(?Category $category = null)
    {
        $category->is_active = 0;
        $category->save();
        return $category;
    }
}
