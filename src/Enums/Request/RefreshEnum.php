<?php
declare(strict_types=1);

namespace Esindex\Enums\Request;

enum RefreshEnum: string
{
    case TRUE = 'true';
    case FALSE = 'false';
    case WAIT_FOR = 'wait_for';
}
