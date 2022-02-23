<?php

namespace App\Domain\Todos\Modules\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class Base
{
    protected PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(getenv('API_TODO_URL'));
    }
}
