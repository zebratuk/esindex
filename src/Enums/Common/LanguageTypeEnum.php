<?php
declare(strict_types=1);

namespace Esindex\Enums\Common;

enum LanguageTypeEnum
{
    case INT;
    case BOOL;
    case FLOAT;
    case STRING;
    case OBJECT;
    case ARRAY;
    case NULL;
    case RESOURCE;
    case UNKNOWN;

    static public function getVariableType($value): self
    {
        return match(true) {
            is_string($value) => self::STRING,
            is_bool($value) => self::BOOL,
            is_int($value) => self::INT,
            is_float($value) => self::FLOAT,
            is_array($value) => self::ARRAY,
            is_null($value) => self::NULL,
            is_object($value) => self::OBJECT,
            is_resource($value) => self::RESOURCE,
            default => self::UNKNOWN
        };
    }
}
