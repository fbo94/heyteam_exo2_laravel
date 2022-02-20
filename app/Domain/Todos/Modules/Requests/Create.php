<?php

namespace App\Domain\Todos\Modules\Requests;

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
    }
}
