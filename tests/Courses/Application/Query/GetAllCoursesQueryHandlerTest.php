<?php

declare(strict_types=1);

namespace Tests\Courses\Application\Query;

use App\Courses\Application\Query\GetAllCoursesQuery;
use App\Courses\Application\Query\GetAllCoursesQueryHandler;
use App\Courses\Application\Query\Model\CourseReadModel;
use App\Courses\Domain\ValueObject\CourseId;
use App\Courses\Infrastructure\InMemory\InMemoryCourseReadRepository;
use PHPUnit\Framework\TestCase;

final class GetAllCoursesQueryHandlerTest extends TestCase
{
    public function testItReturnsAllAvailableCourses(): void
    {
        $courseId1 = CourseId::generate();
        $courseId2 = CourseId::generate();

        $course1 = new CourseReadModel($courseId1, 'DDD Masterclass', 'Learn advanced DDD concepts');
        $course2 = new CourseReadModel($courseId2, 'CQRS in Practice', 'Implement CQRS pattern');

        $repository = new InMemoryCourseReadRepository([
            $courseId1->toString() => $course1,
            $courseId2->toString() => $course2,
        ]);

        $handler = new GetAllCoursesQueryHandler($repository);

        $result = $handler(new GetAllCoursesQuery());

        self::assertCount(2, $result);

        $titles = array_map(fn (CourseReadModel $course) => $course->title, $result);
        self::assertContains('DDD Masterclass', $titles);
        self::assertContains('CQRS in Practice', $titles);
    }

    public function testItReturnsEmptyArrayWhenNoCoursesExist(): void
    {
        $repository = new InMemoryCourseReadRepository([]);

        $handler = new GetAllCoursesQueryHandler($repository);

        $result = $handler(new GetAllCoursesQuery());

        self::assertEmpty($result);
    }
}
