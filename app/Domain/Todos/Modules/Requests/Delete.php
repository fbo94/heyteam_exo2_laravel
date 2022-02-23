<?php

namespace App\Domain\Todos\Modules\Requests;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Delete extends Base
{
    public function delete(string $id): void
    {
        $response = $this->client->delete('/' . $id);

        if ($response->failed()) {
            throw new BadRequestException(sprintf('Error on todo id %s deletion', $id));
        }
    }
}
