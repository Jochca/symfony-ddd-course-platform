<?php

declare(strict_types=1);

namespace App\Courses\Infrastructure\InMemory;

use App\Courses\Domain\ValueObject\CourseId;
use App\Courses\Application\Query\Model\CourseReadModel;
use App\Courses\Application\Query\Repository\CourseReadRepositoryInterface;

final class InMemoryCourseReadRepository implements CourseReadRepositoryInterface
{
    /**
     * @param array<string, CourseReadModel> $courses
     */
    public function __construct(
        private array $courses = [],
    ) {}

    public function getById(CourseId $id): CourseReadModel
    {
        return $this->courses[$id->toString()];
    }
}
