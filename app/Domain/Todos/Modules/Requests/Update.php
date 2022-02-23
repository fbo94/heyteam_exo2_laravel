<?php

namespace App\Domain\Todos\Modules\Requests;

use App\Domain\Todos\Entity\Todo;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Update extends Base
{
    public function update(Todo $todo): void
    {
        $response = $this->client->put('/' . $todo->getId(),
            [
                'checked' => $todo->isChecked(),
                'text' => $todo->getText(),
            ]
        );

        if ($response->failed()) {
            throw new BadRequestException(sprintf('Error on todo id %s for update', $todo->getId()));
        }
    }
}
