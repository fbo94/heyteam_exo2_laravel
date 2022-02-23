<?php

namespace Entity;

use App\Domain\Todos\Entity\Todo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    private Todo $todoTest;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->todoTest = new Todo(Str::uuid(),false,Str::random(30),Carbon::now(), Carbon::now());
        parent::__construct($name, $data, $dataName);
    }

    public function testIsChecked(): void
    {
        $this->todoTest->setChecked(true);
        $this->assertTrue($this->todoTest->isChecked());

        $this->todoTest->setChecked(false);
        $this->assertFalse($this->todoTest->isChecked());
    }

    public function testText(): void
    {
        $text = Str::random(20);
        $this->todoTest->setText($text);
        $this->assertEquals($text,$this->todoTest->getText());
    }

    public function testCreatedAt(): void
    {
        $this->assertInstanceOf(Carbon::class,$this->todoTest->getCreatedAt());
    }

    public function testUpdatedAt(): void
    {
        $this->assertInstanceOf(Carbon::class,$this->todoTest->getUpdatedAt());
        $date = Carbon::now();
        $this->todoTest->setUpdatedAt($date);
        $this->assertEquals($date,$this->todoTest->getUpdatedAt());
    }
}
