<?php

namespace App\Quote;

use Illuminate\Foundation\Inspiring;

class InspireQuote extends BaseQuote implements QuoteInterface
{
    public function fetchQuote(): ?string
    {
        return Inspiring::quotes()->random();
    }
}
