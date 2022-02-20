<?php

namespace App\Domain\Todos\Entity;

use Carbon\Carbon;

class Todo
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $checked;

    /**
     * @var string
     */
    private $text;

    /**
     * @var Carbon
     */
    private $createdAt;

    /**
     * @var Carbon
     */
    private $updatedAt;

    /**
     * @param string $id
     * @param bool $checked
     * @param string $text
     * @param Carbon $createdAt
     * @param Carbon $updatedAt
     */
    public function __construct(string $id, bool $checked, string $text, Carbon $createdAt, Carbon $updatedAt)
    {
        $this->id = $id;
        $this->checked = $checked;
        $this->text = $text;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     */
    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     */
    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
