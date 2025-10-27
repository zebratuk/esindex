<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis\Filter;

enum KeepTypesModeEnum: string
{
    case INCLUDE = 'include';
    case EXCLUDE = 'exclude';
}
