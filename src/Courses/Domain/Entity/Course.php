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
}
