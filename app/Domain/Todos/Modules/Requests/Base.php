<?php

namespace App\Domain\Todos\Modules\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class Base
{
    protected PendingRequest $client;

    public function __construct()
    {
        if (!getenv('API_TODO_URL')) {
            throw new \InvalidArgumentException('La variable d\'environnement API_TODO_URL n\'existe pas');
        }

        $this->client = Http::baseUrl(getenv('API_TODO_URL'));
    }
}
