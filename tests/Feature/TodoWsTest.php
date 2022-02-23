<?php

namespace Tests\Feature;

use App\Domain\Todos\Entity\Todo;
use App\Domain\Todos\Modules\Requests;
use Illuminate\Support\Str;
use Tests\TestCase;

class TodoWsTest extends TestCase
{
    private Requests $requestModule;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->requestModule = new Requests();
        parent::__construct($name, $data, $dataName);
    }

    public function testGetListe(): void
    {
        $liste = $this->requestModule->liste();

        $this->assertIsIterable($liste);
        $this->assertContainsOnly(Todo::class,$liste);
    }

    public function testGetTodo(): void
    {
        $todo = $this->requestModule->get('b5102e30-c1a2-11e9-9c43-c7f5cdf7aa31');
        $this->assertIsObject($todo);
        $this->assertInstanceOf(Todo::class,$todo);
    }

    public function testUpdateTodo(): void
    {
        $todo = $this->requestModule->get('b5102e30-c1a2-11e9-9c43-c7f5cdf7aa31');
        $fakeText = Str::random(25);
        $checkedTest = !$todo->isChecked();
        $todo->setText($fakeText);
        $todo->setChecked($checkedTest);
        $this->requestModule->update($todo);

        $todoUpdated = $this->requestModule->get('b5102e30-c1a2-11e9-9c43-c7f5cdf7aa31');
        $this->assertEquals($fakeText,$todoUpdated->getText());
        $this->assertEquals($checkedTest,$todoUpdated->isChecked());
    }

    public function testCreate(): void
    {
        $this->requestModule->create(true,'[Tests]'.Str::random(10));
    }
}
