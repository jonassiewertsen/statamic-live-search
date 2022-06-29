<?php

namespace Jonassiewertsen\LiveSearch\Traits;

use Illuminate\Support\Collection;
use Statamic\Facades\Search as StatamicSearchFacade;

trait SearchFacade
{
    protected function search($query, string $site, ?string $index = null, ?int $limit = 10): Collection
    {
        return StatamicSearchFacade::index($index)
            ->ensureExists()
            ->search($query)
            ->where('site', $site)
            ->get()
            ->take($limit)
            ->map(function ($item) {
                return $item->toAugmentedCollection();
            });
    }
}
