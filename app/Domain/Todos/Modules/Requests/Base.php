<?php

namespace App\Domain\Todos\Modules\Requests;

use Illuminate\Support\Facades\Http;

abstract class Base
{
    /** @var Http */
    protected $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(getenv('API_TODO_URL'));
    }
}
