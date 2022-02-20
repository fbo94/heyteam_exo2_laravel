<?php

namespace App\Domain\Todos\Modules\Requests;

use App\Domain\Todos\Entity\Todo;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Liste extends Base
{
    public function liste(): Collection
    {
        $response = $this->client->get('/');
        $data = $response->object();

        $list = Collection::make();
        foreach ($data as $todo) {
            $list->push(
                new Todo(
                    $todo->id,
                    $todo->checked,
                    $todo->text,
                    Carbon::createFromTimestampMs($todo->createdAt),
                    Carbon::createFromTimestampMs($todo->updatedAt)
                )
            );
        }

        return $list;
    }
}
