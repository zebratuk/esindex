<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum OnScriptErrorEnum: string
{
    case FAIL = 'fail';
    case CONTINUE = 'continue';
}
