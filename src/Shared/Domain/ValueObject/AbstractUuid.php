<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

abstract class AbstractUuid implements StringableValueObjectInterface
{
    final public function __construct(
        protected readonly string $value
    ) {
        Assert::uuid($value);
    }

    public static function fromString(string $value): static
    {
        return new static($value);
    }

    public static function generate(): static
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
