<?php

namespace App\Domain\Todos\Modules\Requests;

use App\Domain\Todos\Entity\Todo;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use stdClass;

class Liste extends Base
{
    /**
     * @return Collection<Todo>
     */
    public function liste(): Collection
    {
        $response = $this->client->get('/');

        /** @var array<int, stdClass> $data */
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
