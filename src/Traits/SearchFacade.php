<?php

namespace Jonassiewertsen\LiveSearch\Traits;

use Illuminate\Support\Collection;
use Statamic\Facades\Search as StatamicSearchFacade;
use Statmaic\Facades\Site;

trait SearchFacade
{
    protected function search($query, ?string $index = null, ?int $limit = 10, ?string $site = null): Collection
    {
        return StatamicSearchFacade::index($index)
            ->ensureExists()
            ->search($query)
            ->where('site', $site ?? Site::current()->handle)
            ->get()
            ->take($limit)
            ->map(function ($item) {
                return $item->toAugmentedCollection();
            });
    }
}
