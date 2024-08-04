<?php

namespace App\Actions\Brand;

use App\Actions\AsAction;
use App\Models\Brand;

class StoreBrandAction extends AsAction
{
    public function handle(
    ?string $name = "",
    ?string $description = "",
    ): Brand
    {
        return Brand::query()->create([
            'name' => $name,
            'description' => $description
        ]);
    }
}
