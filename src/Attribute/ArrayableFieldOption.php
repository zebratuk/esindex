<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use Attribute;
use Esindex\Contracts\Arrayable;

#[Attribute(Attribute::TARGET_METHOD)]
class ArrayableFieldOption extends FieldOption
{
    public function __construct(
        string $optionLiteral,
        mixed $default = null,
        bool $isEmptyResultAvailable = false,
        readonly public bool $isFilterEmptyValues = true
    ) {
        parent::__construct($optionLiteral, $default, $isEmptyResultAvailable);
    }

    public function processValue(mixed $value): mixed
    {
        if (
            \is_object($value)
            && (
                $value instanceof Arrayable
                || \method_exists($value, 'toArray')
            )
        ) {
            $value = $value->toArray();
        }

        if (
            \is_array($value)
            && $this->isFilterEmptyValues
        ) {
            $value = \array_filter(
                $value,
                static fn($v) => match(true) {
                    \is_null($v) => false,
                    \is_string($v), \is_array($v) => !empty($v),
                    default => true
                }
            );
        }

        return $value;
    }
}
