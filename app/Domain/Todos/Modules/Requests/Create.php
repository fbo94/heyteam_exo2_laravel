<?php

namespace App\Domain\Todos\Modules\Requests;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Create extends Base
{
    public function create(bool $isChecked, string $text): void
    {
        $query = $this->client->post('/',
            [
                'checked' => $isChecked,
                'text' => $text,
            ]
        );

        if ($query->failed()) {
            throw new BadRequestException('Error on request');
        }
    }
}
