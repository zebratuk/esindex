<?php
declare(strict_types=1);

namespace Esindex\Enums\Request\Index;

enum ExpandWildcardsEnum: string
{
    case ALL = 'all';
    case OPEN = 'open';
    case CLOSED = 'closed';
    case HIDDEN = 'hidden';
    case NONE = 'none';
}
