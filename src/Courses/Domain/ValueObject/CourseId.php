<?php

declare(strict_types=1);

namespace App\Courses\Domain\ValueObject;

final readonly class CourseId
{
    public function __construct(
        public string $value
    ) {
    }
}
