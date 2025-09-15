<?php

namespace App\Shared\Domain\ValueObject;

interface StringableValueObjectInterface
{
    public function toString(): string;

    public function __toString(): string;
}
