<?php

declare(strict_types=1);

namespace App\Courses\Application\Query;

use App\Courses\Application\Query\Model\CourseReadModel;
use App\Courses\Application\Query\Repository\CourseReadRepositoryInterface;

final readonly class GetCourseByIdQueryHandler
{
    public function __construct(
        private CourseReadRepositoryInterface $repository,
    ) {
    }

    public function __invoke(GetCourseByIdQuery $query): CourseReadModel
    {
        return $this->repository->getById($query->id);
    }
}
