<?php

declare(strict_types=1);

namespace App\Courses\Domain\Entity;

use App\Courses\Domain\ValueObject\CourseId;

final class Course
{
    public function __construct(
        private CourseId $id,
        private string $title,
        private string $description,
        private float $price,
    ) {
    }

    public function getId(): CourseId
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function changeTitle(string $title): void
    {
        $this->title = $title;
    }

    public function changeDescription(string $description): void
    {
        $this->description = $description;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }
}
