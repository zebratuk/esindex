<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum DynamicEnum: string
{
    case RUNTIME = 'runtime';
    case STRICT = 'strict';
}
