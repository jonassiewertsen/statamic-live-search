<?php

namespace Jonassiewertsen\LiveSearch\Traits;

use Illuminate\Support\Collection;
use Statamic\Facades\Search as StatamicSearchFacade;

trait SearchFacade
{
    protected function search($query, ?string $index = null, ?int $limit = 10): Collection
    {
        return StatamicSearchFacade::index($index)
            ->ensureExists()
            ->search($query)
            ->get()
            ->take($limit)
            ->map(function ($item) use ($index) {
                return $item->toAugmentedCollection()->withShallowNesting();
            });
    }
}
