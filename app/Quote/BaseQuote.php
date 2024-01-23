<?php

namespace App\Quote;

use Illuminate\Support\Facades\Cache;

abstract class BaseQuote
{
    private const CACHE_KEY = 'quotes';

    public function fetch($forceNew = false): array
    {
        if ($forceNew) {
            Cache::forget(self::CACHE_KEY);
        }

        $count = config('app.quote_count');
        $quotes = Cache::remember(self::CACHE_KEY, 60, function () use ($count) {
            return $this->fetchFreshQuotes($count);
        });

        return $quotes;
    }

    public function fetchFreshQuotes(int $count = 5)
    {
        $result = [];
        for ($i = 1; $i <= $count; $i++) {
            $result[] = $this->fetchQuote();
        }

        return $result;
    }

    public function fetchQuote(): ?string
    {
        return null;
    }
}
