<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use Attribute;
use Esindex\Contracts\Attribute\GetterAttributeInterface;

#[Attribute(Attribute::TARGET_METHOD)]
class FieldOption implements GetterAttributeInterface
{
    public function __construct(
        readonly public string $optionLiteral,
        readonly public mixed $default = null,
        readonly public bool $isEmptyResultAvailable = false
    ) {
    }

    public function getStructLiteral(): string
    {
        return $this->optionLiteral;
    }

    public function isEmptyResultAvailable(): bool
    {
        return $this->isEmptyResultAvailable;
    }

    public function getDefaultValue(): mixed
    {
        return $this->default;
    }

    public function processValue(mixed $value): mixed
    {
        return $value;
    }
}
