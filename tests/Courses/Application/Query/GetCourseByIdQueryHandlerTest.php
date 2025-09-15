<?php

declare(strict_types=1);

namespace Tests\Courses\Application\Query;

use App\Courses\Application\Query\GetCourseByIdQuery;
use App\Courses\Application\Query\GetCourseByIdQueryHandler;
use App\Courses\Application\Query\Model\CourseReadModel;
use App\Courses\Domain\ValueObject\CourseId;
use App\Courses\Infrastructure\InMemory\InMemoryCourseReadRepository;
use PHPUnit\Framework\TestCase;

final class GetCourseByIdQueryHandlerTest extends TestCase
{
    public function testItReturnsCourseReadModelWhenCourseExists(): void
    {
        $courseId = CourseId::generate();
        $repository = new InMemoryCourseReadRepository([
            $courseId->toString() => new CourseReadModel($courseId, 'DDD Masterclass', 'Learn advanced DDD concepts'),
        ]);

        $handler = new GetCourseByIdQueryHandler($repository);

        $result = $handler(new GetCourseByIdQuery($courseId));

        self::assertInstanceOf(CourseReadModel::class, $result);
        self::assertSame('DDD Masterclass', $result->title);
    }
}
