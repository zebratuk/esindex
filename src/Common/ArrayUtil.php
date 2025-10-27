<?php
declare(strict_types=1);

namespace Esindex\Common;

class ArrayUtil
{
    public static function getIntOrNull(array $data, string $key): ?int
    {
        return isset($data[$key]) ? (int)$data[$key] : null;
    }

    public static function getBoolOrNull(array $data, string $key): ?bool
    {
        return isset($data[$key]) ? (bool)$data[$key] : null;
    }

    public static function filterNullValues(array $data): array
    {
        return \array_filter(
            $data,
            static fn($v) => null !== $v
        );
    }
}
