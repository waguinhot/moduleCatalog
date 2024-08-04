<?php

namespace App\Actions\Category;

use App\Actions\AsAction;
use App\Models\Category;

class UpdateCategoryAction extends AsAction
{
    public function handle(
    ?int $id = null,
    ?string $name = "",
    ?int $parent_id = null,
    ): Category|int
    {
        return Category::query()->where('id' , $id)->update([
            'name' => $name,
            'parent_id' => $parent_id
        ]);
    }
}
