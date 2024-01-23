<?php

namespace App\Quote;

use Illuminate\Support\Facades\Http;

class KanyeQuote extends BaseQuote implements QuoteInterface
{
    private const BASE_URL = 'https://api.kanye.rest';

    public function fetchQuote(): ?string
    {
        $result = Http::get(self::BASE_URL)->getBody()->getContents();
        $quote = json_decode($result, true);
        if ($quote) {
            return $quote['quote'];
        }

        return null;
    }
}
