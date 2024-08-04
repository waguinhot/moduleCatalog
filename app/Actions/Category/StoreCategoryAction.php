<?php

namespace App\Actions\Category;

use App\Actions\AsAction;
use App\Models\Category;

class StoreCategoryAction extends AsAction
{
    public function handle(
    ?string $name = "",
    ?string $description = "",
    ?int $parent_id = null,
    ): Category
    {
        return Category::query()->create([
            'name' => $name,
            'description' => $description,
            'parent_id' => $parent_id
        ]);
    }
}
