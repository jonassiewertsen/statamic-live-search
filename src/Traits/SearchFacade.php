<?php

namespace Jonassiewertsen\LiveSearch\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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
                return $item->toAugmentedCollection($this->fields($index))->withShallowNesting();
            });
    }

    /**
     * Those fields we want to extract, will be pulled from the config file `config/statamic/search.php`
     * from the belonging search index. In case no index is provied, we will fall back to default.
     */
    protected function fields(?string $index): array
    {
        $index = $index ?? 'default';
        $configKey = "statamic.search.indexes.{$index}.fields";

        if (! config()->has($configKey)) {
            $this->logMissingIndex($index);
        }

        return config($configKey, ['title']);
    }

    /**
     * In case an index does not exist, information will be written into the log file.
     */
    private function logMissingIndex(string $index): void
    {
        $message = "Live Search: The defined index '{$index}' does not exist in your search configuration `config/statamic/search.php`. We will only return the title as filed for now.";

        Log::warning($message);
    }
}
