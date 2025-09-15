<?php

declare(strict_types=1);

namespace App\Tests\Courses\Application\Command;

use App\Courses\Application\Command\CreateCourseCommand;
use App\Courses\Application\Command\CreateCourseCommandHandler;
use App\Courses\Domain\Repository\CourseRepositoryInterface;
use App\Courses\Domain\ValueObject\CourseId;
use App\Courses\Domain\Entity\Course;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class CreateCourseCommandHandlerTest extends TestCase
{
    public function test_it_creates_a_course_and_saves_it(): void
    {
        $repository = $this->createMock(CourseRepositoryInterface::class);

        $repository->expects(self::once())
            ->method('save')
            ->with(self::isInstanceOf(Course::class));

        $handler = new CreateCourseCommandHandler($repository);

        $command = new CreateCourseCommand(
            id: Uuid::uuid4()->toString(),
            title: 'DDD dla zaawansowanych',
            description: 'Poznaj architekturę jak zawodowiec',
            price: 199.99
        );

        $handler->__invoke($command);
    }
}
