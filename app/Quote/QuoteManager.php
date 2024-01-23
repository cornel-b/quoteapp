<?php

namespace App\Quote;

use Illuminate\Support\Manager;

class QuoteManager extends Manager
{
    public function getDefaultDriver()
    {
        return config('app.quote_driver');
    }

    public function createKanyeDriver()
    {
        return new KanyeQuote();
    }

    public function createInspireDriver()
    {
        return new InspireQuote();
    }
}
