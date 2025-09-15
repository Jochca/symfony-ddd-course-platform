<?php

declare(strict_types=1);

namespace App\Courses\Application\Query\Repository;

use App\Courses\Domain\ValueObject\CourseId;
use App\Courses\Application\Query\Model\CourseReadModel;

interface CourseReadRepositoryInterface
{
    public function getById(CourseId $id): CourseReadModel;
}
