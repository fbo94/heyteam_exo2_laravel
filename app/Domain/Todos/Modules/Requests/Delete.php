<?php

namespace App\Domain\Todos\Modules\Requests;

class Delete extends Base
{
    public function delete(string $id): void
    {
        $response = $this->client->delete('/' . $id);
        $data = $response->object();
    }
}
