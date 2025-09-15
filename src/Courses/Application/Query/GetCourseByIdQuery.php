<?php

declare(strict_types=1);

namespace App\Courses\Application\Query;

use App\Courses\Domain\ValueObject\CourseId;

final readonly class GetCourseByIdQuery
{
    public function __construct(
        public CourseId $id,
    ) {}
}
