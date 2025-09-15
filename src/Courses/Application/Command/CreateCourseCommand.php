<?php

declare(strict_types=1);

namespace App\Courses\Application\Command;

final readonly class CreateCourseCommand
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public float $price,
    ) {
    }
}
