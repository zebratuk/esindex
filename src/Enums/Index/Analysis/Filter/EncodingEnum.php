<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis\Filter;

enum EncodingEnum: string
{
    case FLOAT = 'float';
    case IDENTITY = 'identity';
    case INT = 'int';
}
