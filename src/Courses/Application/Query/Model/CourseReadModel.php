<?php

declare(strict_types=1);

namespace App\Courses\Application\Query\Model;

use App\Courses\Domain\ValueObject\CourseId;

final readonly class CourseReadModel
{
    public function __construct(
        public CourseId $id,
        public string $title,
        public string $description,
    ) {
    }
}
