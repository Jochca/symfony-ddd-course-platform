<?php

declare(strict_types=1);

namespace App\Courses\Application\Command;

use App\Courses\Domain\Repository\CourseRepositoryInterface;
use App\Courses\Domain\Entity\Course;
use App\Courses\Domain\ValueObject\CourseId;

final class CreateCourseCommandHandler
{
    public function __construct(
        private CourseRepositoryInterface $repository
    ) {
    }

    public function __invoke(CreateCourseCommand $command): void
    {
        $course = new Course(
            new CourseId($command->id),
            $command->title,
            $command->description,
            $command->price
        );

        $this->repository->save($course);
    }
}
