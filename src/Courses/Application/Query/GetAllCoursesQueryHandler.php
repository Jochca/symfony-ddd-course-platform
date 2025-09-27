<?php

declare(strict_types=1);

namespace App\Courses\Application\Query;

use App\Courses\Application\Query\Model\CourseReadModel;
use App\Courses\Application\Query\Repository\CourseReadRepositoryInterface;

final readonly class GetAllCoursesQueryHandler
{
    public function __construct(
        private CourseReadRepositoryInterface $repository,
    ) {
    }

    /**
     * @return array<CourseReadModel>
     */
    public function __invoke(GetAllCoursesQuery $query): array
    {
        return $this->repository->getAll();
    }
}
