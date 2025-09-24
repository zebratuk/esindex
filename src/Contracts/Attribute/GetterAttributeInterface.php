<?php
declare(strict_types=1);

namespace Esindex\Contracts\Attribute;

interface GetterAttributeInterface
{
    /**
     * Literal name in structure
     *
     * @return string
     */
    public function getStructLiteral(): string;
    public function isEmptyResultAvailable(): bool;
    public function getDefaultValue(): mixed;
    public function processValue(mixed $value): mixed;
}
