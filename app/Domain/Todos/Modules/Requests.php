<?php

namespace App\Domain\Todos\Modules;

use App\Domain\Todos\Modules\Requests\Create;
use App\Domain\Todos\Modules\Requests\Delete;
use App\Domain\Todos\Modules\Requests\Get;
use App\Domain\Todos\Modules\Requests\Liste;
use App\Domain\Todos\Modules\Requests\Update;

/**
 * @mixin Get
 * @mixin Liste
 * @mixin Create
 * @mixin Delete
 * @mixin Update
 *
 */
class Requests
{
    public function __call($name, $arguments)
    {
        return (new \ReflectionClass(__CLASS__ . '\\' . ucfirst($name)))->newInstance()->$name(...$arguments);
    }
}
