<?php

namespace App\Quote;

interface QuoteInterface
{
    public function fetchQuote(): ?string;
}
