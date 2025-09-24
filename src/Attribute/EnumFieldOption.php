<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class EnumFieldOption extends FieldOption
{
    public function processValue(mixed $value): mixed
    {
        if ($value instanceof \BackedEnum) {
            return $value->value;
        }

        return $value;
    }
}
