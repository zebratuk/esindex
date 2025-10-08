<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum RuntimeFieldTypeEnum: string
{
    case BOOLEAN = 'boolean';
    case COMPOSITE = 'composite';
    case DATE = 'date';
    case DOUBLE = 'double';
    case GEO_POINT = 'geo_point';
    case IP = 'ip';
    case KEYWORD = 'keyword';
    case LONG = 'long';
    case LOOKUP = 'lookup';
}
