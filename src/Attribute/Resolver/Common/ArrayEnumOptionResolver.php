<?php
declare(strict_types=1);

namespace Esindex\Attribute\Resolver\Common;

class ArrayEnumOptionResolver
{
    /**
     * @param \BackedEnum[] $data
     * @return array
     */
    static public function mapEnumsToValues(array $data): array
    {
        return array_map(
            static fn($item) => $item instanceof \BackedEnum ? $item->value : $item,
            $data
        );
    }
}
