<?php

declare(strict_types=1);

namespace App\Courses\Domain\Repository;

use App\Courses\Domain\Entity\Course;

interface CourseRepositoryInterface
{
    public function save(Course $course): void;
}
