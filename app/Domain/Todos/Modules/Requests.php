<?php

namespace App\Domain\Todos\Modules;

use App\Domain\Todos\Modules\Requests\Create;
use App\Domain\Todos\Modules\Requests\Delete;
use App\Domain\Todos\Modules\Requests\Get;
use App\Domain\Todos\Modules\Requests\Liste;
use App\Domain\Todos\Modules\Requests\Update;
use ReflectionClass;

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
    public function __call(string $name, mixed $arguments): callable
    {
        $class = __CLASS__ . '\\' . ucfirst($name);

        if (!class_exists($class)) {
            throw new \InvalidArgumentException('La classe '.$name.' n\'existe pas');
        }

        return (new ReflectionClass($class))->newInstance()->$name(...$arguments);
    }
}
