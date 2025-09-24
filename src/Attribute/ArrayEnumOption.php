<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use Attribute;
use Esindex\Attribute\Resolver\Common\ArrayEnumOptionResolver;
use Esindex\Contracts\Arrayable;

#[Attribute(Attribute::TARGET_METHOD)]
class ArrayEnumOption extends FieldOption
{
    public function processValue(mixed $value): mixed
    {
        if (
            is_object($value)
            && (
                $value instanceof Arrayable
                || method_exists($value, 'toArray')
            )
        ) {
            $value = $value->toArray();
        }

        if (is_array($value)) {
            return ArrayEnumOptionResolver::mapEnumsToValues($value);
        }

        return $value;
    }
}
