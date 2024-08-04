<?php

namespace App\Actions\Brand;

use App\Actions\AsAction;
use App\Models\Brand;

class UpdateBrandAction extends AsAction
{
    public function handle(
    ?int $id = null,
    ?string $name = "",
    ?string $description = "",
    ): Brand|int
    {
        return Brand::query()->where('id' , $id)->update([
            'name' => $name,
            'description' => $description
        ]);
    }
}
