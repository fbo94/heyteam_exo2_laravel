<?php

namespace App\Domain\Todos\Entity;

use Carbon\Carbon;

class Todo
{
    private string $id;

    private bool $checked;

    private string $text;

    private Carbon $createdAt;

    private ?Carbon $updatedAt;

    public function __construct(string $id, bool $checked, string $text, Carbon $createdAt, Carbon $updatedAt = null)
    {
        $this->id = $id;
        $this->checked = $checked;
        $this->text = $text;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
