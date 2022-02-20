<?php

namespace App\Domain\Todos\Modules\Requests;

use App\Domain\Todos\Entity\Todo;
use Carbon\Carbon;

class Get extends Base
{
    public function get(string $id): Todo
    {
        $response = $this->client->get('/' . $id);
        $data = $response->object();

        return new Todo(
            $data->id,
            $data->checked,
            $data->text,
            Carbon::createFromTimestampMs($data->createdAt),
            Carbon::createFromTimestampMs($data->updatedAt)
        );
    }
}
