<?php

namespace App\Domain\Todos\Modules\Requests;

use App\Domain\Todos\Entity\Todo;

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
        $data = $response->object();
    }
}
